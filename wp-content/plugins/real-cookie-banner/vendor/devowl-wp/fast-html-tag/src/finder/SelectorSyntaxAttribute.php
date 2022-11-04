<?php

namespace DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder;

use DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\Utils;
/**
 * An attribute definition for `SelectorSyntaxFinder` with attribute name, operator
 * and the requested value.
 */
class SelectorSyntaxAttribute {
    private $attribute;
    private $comparator;
    private $value;
    const COMPARATOR_EXISTS = 'EXISTS';
    const COMPARATOR_EQUAL = '=';
    const COMPARATOR_CONTAINS = '*=';
    const COMPARATOR_STARTS_WITH = '^=';
    const COMPARATOR_ENDS_WITH = '$=';
    const ALLOWED_COMPARATORS = [
        self::COMPARATOR_EQUAL,
        self::COMPARATOR_CONTAINS,
        self::COMPARATOR_STARTS_WITH,
        self::COMPARATOR_ENDS_WITH
    ];
    /**
     * C'tor.
     *
     * @param string $attribute
     * @param string $comparator
     * @param string $value
     * @codeCoverageIgnore
     */
    public function __construct($attribute, $comparator, $value) {
        $this->attribute = $attribute;
        $this->comparator = $comparator;
        $this->value = $value;
    }
    /**
     * Checks if the current attribute and value matches the comparator.
     *
     * @param string $value
     */
    public function matchesComparator($value) {
        switch ($this->comparator) {
            case self::COMPARATOR_EXISTS:
                return $value !== null;
            case \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\SelectorSyntaxAttribute::COMPARATOR_EQUAL:
                return $value === $this->getValue();
            case \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\SelectorSyntaxAttribute::COMPARATOR_CONTAINS:
                return \strpos($value, $this->getValue()) !== \false;
            case \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\SelectorSyntaxAttribute::COMPARATOR_STARTS_WITH:
                return \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\Utils::startsWith($value, $this->getValue());
            case \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\finder\SelectorSyntaxAttribute::COMPARATOR_ENDS_WITH:
                return \DevOwl\RealCookieBanner\Vendor\DevOwl\FastHtmlTag\Utils::endsWith($value, $this->value);
            // @codeCoverageIgnoreStart
            default:
                return \false;
        }
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getAttribute() {
        return $this->attribute;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getComparator() {
        return $this->comparator;
    }
    /**
     * Getter.
     *
     * @codeCoverageIgnore
     */
    public function getValue() {
        return $this->value;
    }
}
