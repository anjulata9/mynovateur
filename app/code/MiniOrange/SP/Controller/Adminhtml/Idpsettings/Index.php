<?php

namespace MiniOrange\SP\Controller\Adminhtml\Idpsettings;

use Magento\Backend\App\Action\Context;
use MiniOrange\SP\Helper\SPConstants;
use MiniOrange\SP\Helper\SPMessages;
use MiniOrange\SP\Controller\Actions\BaseAdminAction;
use MiniOrange\SP\Helper\Saml2\MetadataGenerator;

/**
 * This class handles the action for endpoint: mospsaml/idpsettings/Index
 * Extends the \Magento\Backend\App\Action for Admin Actions which 
 * inturn extends the \Magento\Framework\App\Action\Action class necessary
 * for each Controller class
 */
class Index extends BaseAdminAction
{

    /**
     * The first function to be called when a Controller class is invoked. 
     * Usually, has all our controller logic. Returns a view/page/template 
     * to be shown to the users.
     *
     * This function gets and prepares all our SP config data from the 
     * database. It's called when you visis the moasaml/idpsettings/Index
     * URL. It prepares all the values required on the SP setting
     * page in the backend and returns the block to be displayed. 
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        try{
            $this->checkIfValidPlugin(); //check if user has registered himself
            $entity_id = $this->spUtility->getIssuerUrl();
            $acs_url = $this->spUtility->getAcsUrl();
            $certificate = $this->spUtility->getFileContents($this->spUtility->getResourcePath('sp-certificate.crt'));
            $certificate = $this->spUtility->desanitizeCert($certificate); 
    
            $metadata = new MetadataGenerator($entity_id,TRUE,TRUE,$certificate,$acs_url,$acs_url,$acs_url,$acs_url,$acs_url);
            $metadata = $metadata->generateSPMetadata();
            $this->spUtility->putFileContents($this->spUtility->getMetadataFilePath(),$metadata);
        }catch(\Exception $e){
            $this->messageManager->addErrorMessage($e->getMessage());
			$this->logger->debug($e->getMessage());
        }
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu(SPConstants::MODULE_DIR.SPConstants::MODULE_BASE);
        $resultPage->addBreadcrumb(__('IDP Settings'), __('IDP Settings'));
        $resultPage->getConfig()->getTitle()->prepend(__(SPConstants::MODULE_TITLE));
        return $resultPage;
    }

    /**
     * Is the user allowed to view the Identity Provider settings.
     * This is based on the ACL set by the admin in the backend.
     * Works in conjugation with acl.xml
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed(SPConstants::MODULE_DIR.SPConstants::MODULE_IDPSETTINGS);
    }
}