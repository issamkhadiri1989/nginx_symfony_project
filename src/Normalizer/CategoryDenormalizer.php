<?php

declare(strict_types=1);

namespace App\Normalizer;

use App\DTO\Category;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class CategoryDenormalizer implements DenormalizerInterface
{
    public function __construct(
        #[Autowire(service: 'serializer.normalizer.object')] private readonly DenormalizerInterface $denormalizer,
    ) {
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        /** @var Category $category */
        $category = $this->denormalizer->denormalize($data, $type, $format, $context);

        if (isset($data['slug_aggregation'])) {
            $slug = empty($aggr = $data['slug_aggregation']['buckets']) ? null : $aggr[0]['key'];
            $category->setSlug($slug);
        }

        return $category;
    }

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return Category::class === $type;
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            Category::class => true,
        ];
    }
}
