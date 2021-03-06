<?php
/**
 * @var \yii\web\View
 * @var \zhuravljov\yii\queue\gii\Generator $generator
 * @var string $jobClass
 * @var string $$ns
 * @var string $baseClass
 * @var string[] $interfaces
 * @var string[] $properties
 */

if ($interfaces) {
    $implements = 'implements ' . join(', ', $interfaces);
} else {
    $implements = '';
}

echo "<?php\n";
?>

namespace <?= $ns ?>;

/**
 * Class <?= $jobClass ?>.
 */
class <?= $jobClass ?> extends <?= $baseClass ?> <?= $implements ?>

{
<?php foreach ($properties as $property): ?>
    public $<?= $property ?>;

<?php endforeach; ?>
    /**
     * @inheritdoc
     */
    public function execute($queue)
    {
    }
}


