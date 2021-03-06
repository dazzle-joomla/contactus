<?php
/**
 * @package        contactus
 * @copyright      Copyright (c)2013-2018 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license        GNU General Public License version 3 or later
 */

use FOF30\Utils\FEFHelper\BrowseView;

defined('_JEXEC') or die();

/**
 * @var \Akeeba\ContactUs\Site\View\Item\Html $this
 * @var \Akeeba\ContactUs\Site\Model\Items    $item
 */

$item    = $this->getItem();
$captcha = $this->getCaptchaField();
?>

@section('edit-form-body')
    <div class="akeeba-panel--info">
        <div class="akeeba-form-group">
            <label for="contactus_category_id">
                @fieldtitle('contactus_category_id')
            </label>
            {{ BrowseView::modelSelect('contactus_category_id', 'Categories', $item->contactus_category_id, [
                'fof.autosubmit' => false,
                'translate' => false,
                'apply_access' => true,
                'value_field' => 'title'
            ], [
                'filter_order' => 'ordering',
                'filter_order_Dir' => 'asc',
                'limit' => 100,
                'limitstart' => 0,
            ]) }}
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

    <div class="akeeba-panel--info">
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

    <div class="akeeba-panel--success">

        @if (!empty($captcha))
            <div class="akeeba-form-group">
                {{ $captcha }}
            </div>
        @endif

        <div class="akeeba-form-group--actions">
            <button type="submit" class="akeeba-btn--green--big" name="btnSubmit">
                <span class="akion-ios-email"></span>
                @lang('COM_CONTACTUS_ITEMS_BTN_SUBMIT')
            </button>
        </div>
    </div>
@stop

@section('edit-hidden-fields')
    {{-- Put your additional hidden fields in this section --}}
@stop

<form action="{{ JUri::getInstance()->toString() }}"
      method="post" name="contactUsForm" id="contactUsForm" class="akeeba-form--horizontal">
    {{-- Main form body --}}
    @yield('edit-form-body')
    {{-- Hidden form fields --}}
    <div class="akeeba-hidden-fields-container">
        @section('browse-default-hidden-fields')
            <input type="hidden" name="option" id="option" value="com_contactus"/>
            <input type="hidden" name="view" id="view" value="Item"/>
            <input type="hidden" name="task" id="task" value="save"/>
            <input type="hidden" name="id" id="id" value="{{{ $this->getItem()->getId() }}}"/>
            <input type="hidden" name="Itemid" id="Itemid" value="{{{ $this->getContainer()->input->getInt('Itemid', '') }}}"/>
            <input type="hidden" name="@token()" value="1"/>
        @show
        @yield('edit-hidden-fields')
    </div>
</form>
