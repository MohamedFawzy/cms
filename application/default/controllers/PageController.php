<?php
class PageController extends Zend_Controller_Action
{
	
public function editAction()
{
$id = $this->_request->getParam('id');
$itemPage = new CMS_Content_Item_Page($id);
$pageForm = new Form_PageForm();
$pageForm->setAction('/page/edit');
$pageForm->populate($itemPage->toArray());
// create the image preview
$imagePreview = $pageForm->createElement('image', 'image_preview');
// element options
$imagePreview->setLabel('Preview Image: ');
$imagePreview->setAttrib('style', 'width:200px;height:auto;');
// add the element to the form
$imagePreview->setOrder(4);
$imagePreview->setImage($itemPage->image);
$pageForm->addElement($imagePreview);
$this->view->form = $pageForm;
}

public function deleteAction ()
{
$id = $this->_request->getParam('id');
$itemPage = new CMS_Content_Item_Page($id);
$itemPage->delete();
return $this->_forward('list');
}



}
?>