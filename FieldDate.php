<?php
namespace Pandora3\Widgets\FieldDate;

use Pandora3\Widgets\FieldText\FieldText;

/**
 * Class FieldText
 * @package Pandora3\Widgets\FieldDate
 */
class FieldDate extends FieldText {

	/** @var string $format */
	protected $format;

	/**
	 * @param string $name
	 * @param mixed $value
	 * @param array $context
	 */
	public function __construct(string $name, $value, array $context = []) {
		$this->format = $context['format'] ?? 'd.m.Y';
		parent::__construct($name, $value, $context);
	}

	/**
	 * {@inheritdoc}
	 */
	protected function getContext(): array {
		return array_replace( parent::getContext(), [
			'inputType' => 'text'
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function setValue($value): void {
		if ($value && $value instanceof \DateTimeInterface) {
			$value = $value->format($this->format);
		}
		parent::setValue($value);
	}

	/**
	 * {@inheritdoc}
	 */
	protected function beforeRender(array $context): array {
		$context = parent::beforeRender($context);
		return $context;
	}

}