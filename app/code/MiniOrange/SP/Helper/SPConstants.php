<?php

namespace MiniOrange\SP\Helper;

/** This class lists down constant values used all over our Module. */
class SPConstants
{
	const MODULE_DIR 		= 'MiniOrange_SP';
	const MODULE_TITLE 		= 'SAML 2.0 SP';

	//ACL Settings
	const MODULE_BASE 		= '::SP';
	const MODULE_SPSETTINGS = '::sp_settings';
	const MODULE_IDPSETTINGS= '::idp_settings';
	const MODULE_SIGNIN 	= '::signin_settings';
	const MODULE_ATTR  		= '::attr_settings';
	const MODULE_FAQ  		= '::faq_settings';
	const METADATA_DOWNLOAD	= '::metadata';
	const MODULE_ACCOUNT	= '::account_settings';
	const MODULE_SUPPORT	= '::support';
	const MODULE_UPGRADE 	= '::upgrade';

	const MODULE_IMAGES 	= '::images/';
	const MODULE_CERTS 		= '::certs/';
	const MODULE_CSS 		= '::css/';
	const MODULE_JS 		= '::js/';
	const MODULE_GUIDES 	= '::idpsetupguides/';
	const MODULE_METADATA 	= '::metadata/metadata.xml';

	// request option parameter values
	const LOGIN_ADMIN_OPT	= 'loginAdminUser';
	const TEST_CONFIG_OPT 	= 'testConfig';
	const SAML_SSO_FALSE 	= 'saml_sso';

	//database keys
	const SESSION_INDEX 	= 'sessionIndex';
	const NAME_ID 			= 'nameId';
	const IDP_NAME 			= 'identityProviderName';
	const X509CERT 			= 'certificate';
	const RESPONSE_SIGNED 	= 'responseSigned';
	const ASSERTION_SIGNED 	= 'assertionSigned';
	const ISSUER 			= 'samlIssuer';
	const DB_FIRSTNAME 		= 'firstname';
	const DB_LASTNAME 		= 'lastname';
	const AUTO_REDIRECT 	= 'autoRedirect';
	const SAML_SSO_URL 		= 'ssourl';
	const SAML_SLO_URL 		= 'logouturl';
	const BINDING_TYPE 		= 'loginBindingType';
	const LOGOUT_BINDING 	= 'logoutBindingType';
	const FORCE_AUTHN 		= 'forceAuthn';
	const SAMLSP_KEY 		= 'customerKey';
	const SAMLSP_EMAIL		= 'email';
	const SAMLSP_PHONE		= 'phone';
	const SAMLSP_CNAME		= 'cname';
	const SAMLSP_FIRSTNAME	= 'customerFirstName';
	const SAMLSP_LASTNAME	= 'customerLastName';
	const SAMLSP_CKL 		= 'ckl';
	const SAMLSP_LK 		= 'lk';
	const BACKDOOR 			= 'backdoor';
	const SHOW_ADMIN_LINK 	= 'showadminlink';
	const SHOW_CUSTOMER_LINK= 'showcustomerlink';
	const REG_STATUS 		= 'registrationStatus';
	const API_KEY 			= 'apiKey';
	const TOKEN 			= 'token';
	const BUTTON_TEXT 		= 'buttonText';
	const OTP_TYPE 			= 'otpType';
	const AUTO_CREATE_ADMIN     = 'mo_saml_auto_create_admin';
    const AUTO_CREATE_CUSTOMER  = 'mo_saml_auto_create_customer';

   // B2B related constants;
    const B2B_STORE_URL     = 'b2bStoreUrl';
    const B2B_ACCOUNT_ID    = 'account_id';
    const COMPANY_TABLE     = 'company';
    const CUSTOMER_TABLE    = 'customer_entity';
    const COMPANY_ADVANCED_TABLE = 'company_advanced_customer_entity';
    const COMPANY_ROLES_TABLE    = 'company_roles';
    const CUSTOMER_ADDRESS_ENTITY_TABLE = 'customer_address_entity';
    const COMPANY_USER_ROLES_TABLE  = 'company_user_roles';
    const AX_COMPANY_ATTR = 'ax_company_id';

	// attribute mapping constants
	const MAP_EMAIL 		= 'amEmail';
    const MAP_USERNAME		= 'amUsername';
    const MAP_FIRSTNAME 	= 'amFirstName';
    const MAP_LASTNAME 		= 'amLastName';
    const MAP_GROUP 		= 'amGroupName';
    const MAP_MAP_BY 		= 'amAccountMatcher';
    const MAP_COMPANY_ID 	= 'amCompanyId';

    //Default Attributes values if no mapping found
    const DEFAULT_MAP_EMAIL = 'email';
	const DEFAULT_MAP_USERN = 'username';
	const DEFAULT_MAP_FN 	= 'firstName';
    Const DEFAULT_MAP_BY 	= 'email';
	const DEFAULT_GROUP  	= 'General';
    const DEFAULT_ROLE  	= 'Administrators';
	const DEFAULT_MAP_CN    = 'country';

    const MAP_DEFAULT_ROLE 	= 'defaultRole';
    const MAP_DEFAULT_GROUP = 'defaultGroup';

	const TEST_RELAYSTATE 	= 'testvalidate';
	const UNLISTED_ROLE 	= 'unlistedRole';
	const CREATEIFNOTMAP 	= 'createUserIfRoleNotMapped';
	const ROLES_MAPPED 	    = 'samlAdminRoleMapping';
	const GROUPS_MAPPED 	= 'samlCustomerRoleMapping';
	const CUSTOM_MAPPED     = 'customAttributeMapping';
	const USER_ID           = 'userId';
	const DEFAULT_ATTRIBUTE_MAPPED = 'defaultAttributeMapping';

	//columns
	const COLUMN_FIRSTNAME = 'firstname';
	const COLUMN_ENTITY = "entity_id";
	const COLUMN_LASTNAME = 'lastname';
	const COLUMN_CITY = "city";
	const ATTRIBUTE_CITY_VALUE = "amCityValue";
	const ATTRIBUTE_CITY_KEY = "amCityKey";


	//Tables
     const MAP_TABLE = 'amTable';

  //default  attribute mapping constants
    const MAP_COUNTRY = 'amCountry';
    const MAP_CITY = 'amCity';
	const MAP_ADDRESS = 'amAddress';
	const MAP_PHONE = 'amPhone';

	//URLs
	const ISSUER_URL_PATH 	= 'mospsaml/metadata/index';
	const SAML_LOGIN_URL 	= 'mospsaml/actions/sendAuthnRequest';

	//session data
	const USER_LOGOUT_DETAIL= 'userDetails';
	const SEND_RESPONSE 	= 'sendLogoutResponse';
	const LOGOUT_REQUEST_ID = 'logoutRequestId';
	const TXT_ID 			= 'miniorange/samlsp/transactionID';

	//images
	const IMAGE_RIGHT 		= 'right.png';
	const IMAGE_WRONG 		= 'wrong.png';

	//certs
	const SP_KEY 			= 'sp-key.key';
	const ALTERNATE_KEY 	= 'miniorange_sp_priv_key.key';
	const PUBLIC_KEY 		= 'sp-certificate.crt';

	//SAML Constants
	const SAML 	 			= 'SAML';
	const AUTHN_REQUEST 	= 'AuthnRequest';
	const SAML_RESPONSE 	= 'SamlResponse';
	const WS_FED_RESPONSE 	= 'WsFedResponse';
	const HTTP_REDIRECT 	= 'HttpRedirect';
	const LOGOUT_REQUEST 	= 'LogoutRequest';

	//OTP Constants
	const OTP_TYPE_EMAIL	= 'email';
	const OTP_TYPE_PHONE	= 'sms';

	//Registration Status
	const STATUS_VERIFY_LOGIN 	= "MO_VERIFY_CUSTOMER";
	const STATUS_COMPLETE_LOGIN = "MO_VERIFIED";
	const STATUS_VERIFY_EMAIL 	= "MO_OTP_EMAIL_VALIDATE";

	//plugin constants
	const DEFAULT_CUSTOMER_KEY 	= "16555";
	const DEFAULT_API_KEY 		= "fFd2XcvTGDemZvbw1bcUesNJWEqKbbUq";
	const APPLICATION_NAME		= "MAGENTO_SAML_PREMIUM_EXTENSION";
	const APPLICATION_PLAN_NAME = "magento_saml_premium_plan";
    const HOSTNAME				= "https://login.xecurify.com";
	const AREA_OF_INTEREST 		= 'Magento 2.0 Saml SP Plugin';
    const DB_USER =               'user';
}
