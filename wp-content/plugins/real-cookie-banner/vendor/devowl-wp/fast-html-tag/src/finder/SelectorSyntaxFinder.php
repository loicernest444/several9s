<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder;

use DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\match\SelectorSyntaxMatch;
/**
 * Find HTML tags by a selector syntax like `div[id="my-id"]`.
 */
class SelectorSyntaxFinder extends \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\TagAttributeFinder {
    private $expression;
    private $tag;
    private $attributes;
    /**
     * See class description.
     *
     * Available matches:
     *      $match[0] => Full string
     *      $match[1] => Tag
     *      $match[2] => Attribute
     *      $match[3] => Comparator (can be empty)
     *      $match[4] => Value (can be empty)
     *
     * @see https://regex101.com/r/vlbn3Y/3/
     */
    const EXPRESSION_REGEXP = '/^([A-Za-z_-]+)(?:%s)+$/m';
    /**
     * PCRE does currently not support repeating capture groups, we need to capture this manually
     * by duplicating the attribute regular expression.
     */
    const EXPRESSION_REGEXP_INNER_SINGLE_ATTRIBUTE = '\\[([A-Za-z_-]+)(?:(%s)"([^"]+)")?]';
    /**
     * C'tor.
     *
     * @param string $expression
     * @param string $tag
     * @param SelectorSyntaxAttribute[] $attributes
     * @codeCoverageIgnore
     */
    private function __construct($expression, $tag, $attributes) {
        parent::__construct([$tag], [$attributes[0]->getAttribute()]);
        $this->expression = $expression;
        $this->tag = $tag;
        $this->attributes = $attributes;
    }
    /**
     * See `AbstractRegexFinder`.
     *
     * @param array $m
     */
    public function createMatch($m) {
        list($beforeLinkAttribute, $tag, $linkAttribute, $link, $afterLink, $attributes) = self::prepareMatch($m);
        // Append our original link attribute to the attributes
        $attributes[$linkAttribute] = $link;
        if ($this->matchesAttributes($attributes)) {
            return new \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\match\SelectorSyntaxMatch(
                $this,
                $m[0],
                $tag,
                $attributes,
                $beforeLinkAttribute,
                $afterLink,
                $linkAttribute,
                $link
            );
        }
        return \false;
    }
    /**
     * Checks if the current attribute and value matches all our defined attributes.
     *
     * @param array $values
     */
    public function matchesAttributes($values) {
        foreach ($this->attributes as $attribute) {
            $value = $values[$attribute->getAttribute()] ?? null;
            if (!$attribute->matchesComparator($value)) {
                return \false;
            }
        }
        return \true;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getExpression() {
        return $this->expression;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getTag() {
        return $this->tag;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getAttributes() {
        return $this->attributes;
    }
    /**
     * Create an instance from an expression like `div[id="my-id"]`.
     *
     * @param string $expression
     * @return SelectorSyntaxFinder|false Returns `false` if the expression is invalid
     */
    public static function fromExpression($expression) {
        $singleAttributeRegexp = \sprintf(
            self::EXPRESSION_REGEXP_INNER_SINGLE_ATTRIBUTE,
            \join(
                '|',
                \array_map(
                    'preg_quote',
                    \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\SelectorSyntaxAttribute::ALLOWED_COMPARATORS
                )
            )
        );
        $fullExpressionRegexp = \sprintf(
            \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\SelectorSyntaxFinder::EXPRESSION_REGEXP,
            $singleAttributeRegexp
        );
        if (\preg_match($fullExpressionRegexp, $expression)) {
            $split = \explode('[', $expression, 2);
            $tag = $split[0];
            $attributesExpression = '[' . $split[1];
            if (
                \preg_match_all(
                    \sprintf('/%s/m', $singleAttributeRegexp),
                    $attributesExpression,
                    $attributeMatches,
                    \PREG_SET_ORDER
                )
            ) {
                $attributeInstances = [];
                foreach ($attributeMatches as $attributeMatch) {
                    $attributeInstances[] = new \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\SelectorSyntaxAttribute(
                        $attributeMatch[1],
                        $attributeMatch[2] ??
                            \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\SelectorSyntaxAttribute::COMPARATOR_EXISTS,
                        $attributeMatch[3] ?? null
                    );
                }
                return new \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\SelectorSyntaxFinder(
                    $expression,
                    $tag,
                    $attributeInstances
                );
            }
        }
        // @codeCoverageIgnoreStart
        return \false;
        // @codeCoverageIgnoreEnd
    }
}
