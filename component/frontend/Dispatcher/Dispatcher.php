<?php
/**
 * @package        contactus
 * @copyright      Copyright (c)2013-2018 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license        GNU General Public License version 3 or later
 */

namespace Akeeba\ContactUs\Site\Dispatcher;

defined('_JEXEC') or die();

use FOF30\Dispatcher\Dispatcher as BaseDispatcher;
use FOF30\Dispatcher\Mixin\ViewAliases;

class Dispatcher extends BaseDispatcher
{
	use ViewAliases {
		onBeforeDispatch as onBeforeDispatchViewAliases;
	}

	public function onBeforeDispatch()
	{
		$this->onBeforeDispatchViewAliases();

		// Load the FOF language
		$lang = $this->container->platform->getLanguage();
		$lang->load('lib_fof30', JPATH_ADMINISTRATOR, 'en-GB', true, true);
		$lang->load('lib_fof30', JPATH_ADMINISTRATOR, null, true, false);

		// Renderer options (0=none, 1=frontend, 2=backend, 3=both)
		$useFEF   = $this->container->params->get('load_fef', 3);
		$fefReset = $this->container->params->get('fef_reset', 3);

		// FEF Renderer options. Used to load the common CSS file.
		$this->container->renderer->setOptions([
			'load_fef'      => in_array( $useFEF, [ 1, 3 ] ),
			'fef_reset'     => in_array( $fefReset, [ 1, 3 ] )
			//'custom_css' => 'admin://components/com_datacompliance/media/css/frontend.min.css'
		]);
	}

}