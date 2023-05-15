<?php
declare(strict_types=1);

namespace App\Twig\TwigStackExtension;

use App\Twig\TwigStackExtension\NodeVisitors\StackNodeVisitor;
use App\Twig\TwigStackExtension\TokenParsers\PrependTokenParser;
use App\Twig\TwigStackExtension\TokenParsers\PushTokenParser;
use App\Twig\TwigStackExtension\TokenParsers\StackTokenParser;
use Twig\Extension\ExtensionInterface;

/**
 * TwigStackExtension
 *
 * Define all the features of this extension.
 */
final class TwigStackExtension implements ExtensionInterface
{
    /**
     * TwigStackExtension->manager
     *
     * @var StacksManager
     */
    private $manager;

    /**
     * TwigStackExtension->enableBlockParsers
     *
     * @var bool
     */
    private $enableBlockParsers = false;

    /**
     * new TwigStackExtension()
     *
     * @param bool $enableBlockParsers
     */
    public function __construct(bool $enableBlockParsers = false)
    {
        $this->manager = new StacksManager();
        $this->enableBlockParsers = $enableBlockParsers;
    }

    /**
     * TwigStackExtension->getManager()
     *
     * @return StacksManager
     */
    public function getManager(): StacksManager
    {
        return $this->manager;
    }

    /**
     * @inheritDoc
     */
    public function getTokenParsers()
    {
        return [
            new StackTokenParser(),
            new PushTokenParser(),
            new PrependTokenParser(),
        ];
    }

    /**
     * @inheritDoc
     */
    public function getNodeVisitors()
    {
        return [
            new StackNodeVisitor(),
        ];
    }

    /**
     * @inheritDoc
     */
    public function getFilters()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getTests()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getFunctions()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getOperators()
    {
        return [];
    }
}
