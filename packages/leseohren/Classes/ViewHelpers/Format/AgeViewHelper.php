<?php
/**
 * Age ViewHelper
 *
 * @package EXT:leseohren
 * @author Sven Kalbhenn <sven@skom.de>
 * @link https://www.skom.de
 */

namespace SKom\Leseohren\ViewHelpers\Format;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\Exception;

/**
 * Renders the age of a DateTime object
 *
 * = Examples =
 *
 * <code>
 * <f:format.age>{birthday}</f:format.age>
 * </code>
 * <output>
 * 30 Jahre
 * </output>
 *
 * <code title="inline syntax>
 * {person.birthday -> f:format.age()}
 * </code>
 * <output>
 * 23 Jahre
 * </output>
 *
 * @api
 */
class AgeViewHelper extends AbstractViewHelper {

	/**
	 * @var array
	 */
	protected $labels = array(
		'y' => array('Jahr', 'Jahre'),
		'm' => array('Monat', 'Monate'),
		'd' => array('Tag', 'Tage'),
		'h' => array('Stunde', 'Stunden'),
		'i' => array('Minute', 'Minuten'),
		's' => array('Sekunde', 'Sekunden')
	);

	/**
	 * Renders the output of this view helper
	 *
	 * @return string Identity
	 * @api
	 */
	public function render() {
		$date = $this->renderChildren();
		if (!$date instanceof \DateTime) {
			throw new \TYPO3\Fluid\Exception('f:format.age expects a DateTime object, ' . \gettype($date) . ' given.', 1286531071);
		}
		return $this->formatDateDifference($date);
	}

	/**
	 * @param \DateTime $startDate
	 * @param \DateTime $endDate
	 * @return string
	 */
	protected function formatDateDifference(\DateTime $startDate, \DateTime $endDate = NULL) {
		if($endDate === NULL) {
			$endDate = new \DateTime();
		}

		$dateInterval = $endDate->diff($startDate, TRUE);
		$doPlural = function($nb,$str){return $nb>1?$str.'s':$str;}; // adds plurals

		$format = '';
		foreach($this->labels as $formatKey => $label) {
			if ($dateInterval->$formatKey === 0) {
				continue;
			}
			$format .= '%' . $formatKey . ' ';
			$format .= $dateInterval->$formatKey > 1 ? $label[1] : $label[0];
			$format .= ' ';
			break;
		}
		$format = '%r' . rtrim($format);
		return $dateInterval->format($format);
	}

}

?>
