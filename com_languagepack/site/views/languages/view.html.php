<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_languagepack
 *
 * @copyright   Copyright (C) 2020 - 2020 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView;

/**
 * HTML Languages View class for the Language pack component
 *
 * @since  1.0
 */
class LanguagepackViewLanguages extends HtmlView
{
	/**
	 * List of languages
	 *
	 * @var  array
	 */
	protected $languages = array();

	/**
	 * The application name we are listing languages for
	 *
	 * @var  string
	 */
	protected $applicationName;

	/**
	 * Execute and display a template script.
	 *
	 * @param string $tpl The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  mixed  A string if successful, otherwise an Error object.
	 */
	public function display($tpl = null)
	{
		/** @var \LanguagepackModelLanguages $model */
		$model = $this->getModel();
		$this->applicationName = $model->getApplicationName();
		$this->languages = $model->getItems();

		if ($this->languages === false)
		{
			// TODO: Improve this get all errors and pipe them all in maybe a custom exception
			throw new \RuntimeException($model->getError());
		}

		return parent::display($tpl);
	}
}
