<?php
declare(strict_types=1);

namespace App\Twig\TwigStackExtension\NodeVisitors;

use App\Twig\TwigStackExtension\Nodes\BodyNode;
use Twig\Environment;
use Twig\Node\ModuleNode;
use Twig\Node\Node;
use Twig\NodeVisitor\NodeVisitorInterface;

/**
 * StackNodeVisitor
 *
 * Handle the Twig Nodes in order to enable the stack feature of this
 * extension.
 */
final class StackNodeVisitor implements NodeVisitorInterface
{
    /**
     * @inheritDoc
     */
    public function enterNode(Node $node, Environment $env): Node
    {
        return $node;
    }

    /**
     * @inheritDoc
     */
    public function leaveNode(Node $node, Environment $env): ?Node
    {
        if (!($node instanceof ModuleNode)) {
            return $node;
        }

        if ($node->hasNode('body') && !$node->hasNode('parent')) {
            $body = $node->getNode('body');
            $node->setNode('body', new BodyNode($body));
        }

        return $node;
    }

    /**
     * @inheritDoc
     */
    public function getPriority()
    {
        return -10;
    }
}
