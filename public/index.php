<?php

use Collection\GeneratorCollection;
use Generator\RandomStringGenerator;
use Generator\RandomStringArrayGenerator;
use Converter\PatternConverter;
use Converter\Rot13Converter;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\Config\FileLocator;

require __DIR__ . '/../vendor/autoload.php';

$container = new ContainerBuilder();

$loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../config'));
$loader->load('services.yaml');

$container->compile();

$generatorCollection = new GeneratorCollection();

$randomStringGenerator = $container->get(RandomStringGenerator::class);
$randomStringArrayGenerator = $container->get(RandomStringArrayGenerator::class);

$generatorCollection->addGenerator($randomStringGenerator);
$generatorCollection->addGenerator($randomStringArrayGenerator);

$patternConverter = $container->get(PatternConverter::class);
$rot13Converter = $container->get(Rot13Converter::class);

header('Content-Type: text/html; charset=utf-8');

echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>Generator Output</title>";
echo "</head>";
echo "<body>";
echo "<h1>Generator and Converter Output</h1>";

foreach ($generatorCollection->getGenerators() as $generator) {
    $generatedData = $generator->generate();

    echo "<p><strong>Generated Data:</strong> " . (is_array($generatedData) ? implode(', ', $generatedData) : $generatedData) . "</p>";
    echo "<p><strong>Pattern Converted:</strong> " . $patternConverter->convert($generatedData) . "</p>";
    echo "<p><strong>ROT13 Converted:</strong> " . $rot13Converter->convert($generatedData) . "</p>";
    echo "<hr>";
}

echo "</body>";
echo "</html>";
