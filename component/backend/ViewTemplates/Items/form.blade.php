<?php
/**
 * @package        contactus
 * @copyright      Copyright (c)2013-2018 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license        GNU General Public License version 3 or later
 */

use Akeeba\ContactUs\Admin\Model\Items;
use FOF30\Utils\FEFHelper\Html as FEFHtml;
use FOF30\Utils\FEFHelper\BrowseView;
use FOF30\Utils\SelectOptions;
use Akeeba\ContactUs\Admin\View\Category\Html;

defined('_JEXEC') or die();

/**
 * @var  Html  $this
 * @var  Items $item
 */

$item = $this->item;

?>
@extends('admin:com_contactus/Common/edit')

@section('edit-form-body')

    <div class="akeeba-panel--teal" id="akeeba-contactus-item-basic-information">
        <header class="akeeba-block-header">
            <h3>@lang('COM_CONTACTUS_ITEMS_GROUP_BASIC')</h3>
        </header>

        <div class="akeeba-form-group">
            <label for="contactus_category_id">
                @fieldtitle('contactus_category_id')
            </label>
		    <?php echo BrowseView::modelSelect('contactus_category_id', 'Categories', $item->contactus_category_id, ['fof.autosubmit' => false, 'translate' => false]) ?>
        </div>

        <div class="akeeba-form-group">
            <label for="fromname">
                @fieldtitle('fromname')
            </label>
            <input type="text" class="fromname" name="fromname" id="fromname" value="{{{ $item->fromname }}}">
        </div>

        <div class="akeeba-form-group">
            <label for="fromemail">
                @fieldtitle('fromemail')
            </label>
            <input type="text" class="fromemail" name="fromemail" id="fromemail" value="{{{ $item->fromemail }}}">
        </div>
    </div>

    <div class="akeeba-panel--teal" id="akeeba-contactus-item-message">
        <header class="akeeba-block-header">
            <h3>@lang('COM_CONTACTUS_ITEMS_GROUP_MESSAGE')</h3>
        </header>

        <div class="akeeba-form-group">
            <label for="subject">
                @fieldtitle('subject')
            </label>
            <input type="text" class="subject" name="subject" id="subject" value="{{{ $item->subject }}}">
        </div>

        <div class="akeeba-form-group">
            <label for="body">
                @fieldtitle('body')
            </label>
            <div class="akeeba-nofef">
                @jhtml('FEFHelper.edit.editor', 'body', $item->body)
            </div>
        </div>

    </div>
@stop
