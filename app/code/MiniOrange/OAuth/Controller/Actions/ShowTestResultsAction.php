<?php


namespace MiniOrange\OAuth\Controller\Actions;

use MiniOrange\OAuth\Helper\OAuthConstants;
class ShowTestResultsAction extends BaseAction
{
    private $attrs;
    private $userEmail;
    private $oauthException;
    private $hasExceptionOccurred;
    private $template = "\x3c\x64\x69\166\x20\x73\x74\x79\x6c\145\75\42\x66\157\x6e\164\x2d\x66\141\155\x69\154\x79\72\103\141\154\151\x62\162\151\73\x70\141\144\x64\x69\156\147\x3a\x30\x20\63\x25\x3b\x22\x3e\x7b\173\150\x65\x61\144\145\162\x7d\175\x7b\x7b\x63\157\155\155\x6f\156\x62\157\144\x79\x7d\175\x7b\x7b\x66\157\x6f\x74\x65\162\175\175\74\57\144\151\x76\76";
    private $successHeader = "\40\x3c\x64\x69\x76\x20\163\x74\171\154\x65\x3d\42\143\x6f\154\x6f\162\72\40\43\x33\143\x37\66\63\x64\73\142\141\143\x6b\x67\162\157\165\156\144\x2d\x63\x6f\x6c\157\162\x3a\40\43\144\146\x66\x30\x64\70\x3b\40\160\x61\x64\x64\x69\x6e\x67\72\x32\x25\73\155\141\162\x67\151\156\55\x62\157\x74\x74\157\155\72\62\60\160\x78\73\x74\145\x78\164\x2d\x61\x6c\x69\147\156\72\143\x65\x6e\164\145\162\x3b\x20\15\xa\x20\40\x20\x20\x20\x20\40\40\x20\40\x20\40\40\x20\40\x20\40\40\x20\x20\40\x20\40\40\40\40\x20\40\x20\40\40\x20\x20\x20\40\x20\x62\x6f\162\144\145\162\x3a\61\x70\x78\x20\x73\x6f\x6c\151\x64\40\43\101\105\104\x42\x39\101\73\x20\x66\157\156\164\55\163\151\x7a\x65\x3a\x31\70\160\164\73\x22\x3e\x54\105\x53\x54\x20\x53\x55\103\x43\x45\123\x53\x46\x55\114\15\12\x20\40\x20\40\40\x20\40\x20\40\40\40\40\40\x20\40\x20\x20\x20\40\40\40\40\x20\40\x20\40\40\x20\40\x20\40\40\74\57\144\x69\166\76\15\12\x20\x20\x20\40\40\x20\x20\x20\40\x20\40\x20\x20\40\x20\x20\x20\x20\x20\x20\40\40\40\x20\x20\40\x20\x20\40\x20\x20\x20\74\x64\151\x76\x20\163\x74\171\x6c\145\x3d\x22\x64\151\163\x70\154\141\171\x3a\x62\154\x6f\x63\153\73\x74\x65\x78\164\x2d\x61\154\151\147\156\72\x63\145\x6e\x74\145\x72\73\155\x61\162\147\151\x6e\x2d\142\x6f\x74\x74\x6f\x6d\x3a\x34\45\73\x22\76\x3c\x69\x6d\147\x20\x73\x74\x79\154\x65\x3d\42\x77\151\144\164\150\x3a\x31\x35\45\x3b\x22\40\x73\162\x63\x3d\x22\x7b\173\162\x69\147\x68\x74\x7d\x7d\42\x3e\x3c\x2f\x64\151\166\76";
    private $errorHeader = "\40\x3c\144\151\166\40\163\x74\x79\154\x65\75\42\x63\157\x6c\157\162\x3a\40\x23\141\x39\64\x34\64\x32\x3b\x62\141\x63\x6b\147\162\157\x75\156\x64\x2d\x63\157\154\x6f\x72\x3a\40\43\x66\x32\144\145\144\x65\x3b\160\141\144\x64\151\x6e\147\x3a\40\x31\x35\160\x78\73\155\141\x72\147\151\156\x2d\x62\157\x74\x74\x6f\155\x3a\x20\62\x30\x70\x78\x3b\x74\145\x78\164\55\141\154\x69\x67\x6e\72\143\x65\x6e\164\145\x72\73\xd\12\40\40\x20\x20\x20\40\x20\x20\x20\x20\x20\x20\x20\40\x20\x20\40\x20\40\40\40\x20\x20\x20\x20\x20\40\40\x20\x20\x20\40\40\x20\x20\40\142\x6f\x72\x64\x65\x72\72\61\x70\170\40\x73\x6f\154\151\144\x20\x23\x45\x36\102\63\102\62\x3b\x66\x6f\156\164\x2d\x73\x69\172\x65\72\61\70\x70\164\73\x22\x3e\x54\105\x53\124\x20\106\101\x49\x4c\x45\104\15\12\x20\x20\x20\40\40\40\x20\x20\40\x20\40\40\40\40\40\x20\x20\x20\40\x20\40\x20\x20\40\40\x20\40\x20\40\40\40\x20\x3c\57\x64\x69\x76\76\x3c\x64\151\166\40\163\x74\x79\154\x65\75\x22\144\151\x73\x70\x6c\141\171\x3a\x62\x6c\x6f\x63\x6b\73\164\x65\x78\164\55\141\x6c\151\147\x6e\72\143\145\156\164\145\x72\x3b\x6d\x61\162\147\151\156\x2d\142\157\x74\164\x6f\155\72\x34\45\73\x22\76\74\151\x6d\147\x20\163\164\x79\x6c\x65\x3d\x22\x77\151\x64\164\x68\x3a\61\65\x25\x3b\42\163\162\x63\75\42\x7b\x7b\167\162\157\156\x67\x7d\175\42\76\x3c\57\144\x69\x76\76";
    private $commonBody = "\x3c\x73\160\x61\x6e\40\163\x74\171\x6c\x65\75\42\146\157\x6e\x74\x2d\163\151\172\145\x3a\61\x34\x70\164\73\42\76\x3c\142\76\110\x65\x6c\x6c\157\x3c\x2f\142\76\54\40\x7b\x7b\x65\x6d\141\151\x6c\175\x7d\x3c\x2f\163\x70\141\x6e\76\x3c\x62\162\57\x3e\15\xa\x20\40\x20\40\x20\40\x20\40\x20\x20\40\40\40\40\x20\40\40\x20\x20\40\40\40\40\x20\x20\x20\40\x20\40\x20\x20\40\x3c\x70\40\163\x74\171\x6c\x65\75\x22\x66\x6f\x6e\164\55\x77\145\x69\x67\150\x74\72\142\157\x6c\x64\73\146\x6f\156\x74\x2d\163\x69\172\145\72\x31\64\x70\164\x3b\155\x61\x72\x67\151\x6e\x2d\154\145\x66\x74\x3a\61\45\x3b\x22\76\x41\124\x54\122\x49\x42\x55\124\105\x53\x20\122\x45\x43\x45\111\x56\105\104\72\x3c\57\160\76\15\12\40\x20\x20\x20\40\x20\x20\40\40\x20\x20\40\40\40\40\x20\40\x20\x20\40\x20\x20\x20\40\40\40\40\x20\x20\40\40\40\74\164\141\x62\154\x65\x20\163\x74\x79\x6c\145\75\x22\142\x6f\x72\144\x65\x72\x2d\143\x6f\154\154\141\160\163\x65\72\143\157\x6c\x6c\x61\160\x73\145\73\x62\157\162\x64\x65\162\x2d\x73\160\141\143\151\x6e\x67\x3a\60\73\x20\144\151\163\160\154\x61\x79\72\164\141\142\154\x65\73\x77\x69\x64\164\150\x3a\61\60\x30\x25\x3b\x20\xd\xa\40\x20\x20\40\40\x20\40\x20\40\x20\x20\x20\x20\40\x20\40\x20\40\40\40\40\40\x20\40\x20\x20\40\x20\x20\40\x20\x20\x20\40\x20\40\146\x6f\156\164\55\x73\x69\172\x65\72\x31\x34\160\164\x3b\x62\141\143\153\147\162\x6f\165\156\144\55\143\157\154\x6f\x72\x3a\43\105\104\x45\104\105\104\73\42\76\15\xa\40\40\40\x20\40\40\40\40\40\40\x20\40\40\x20\x20\x20\x20\x20\40\x20\x20\40\40\x20\40\40\x20\40\x20\x20\x20\40\40\x20\x20\40\x3c\x74\162\x20\x73\x74\x79\x6c\x65\75\42\164\145\x78\x74\55\141\154\x69\x67\156\72\x63\x65\x6e\164\145\162\73\42\x3e\15\xa\x20\x20\40\x20\40\x20\40\x20\40\x20\40\x20\40\x20\x20\x20\40\40\40\40\40\x20\x20\x20\40\40\x20\40\40\40\40\40\x20\x20\x20\x20\40\x20\40\40\74\164\144\40\x73\164\171\154\145\x3d\42\x66\x6f\156\164\x2d\167\145\x69\147\150\164\72\x62\x6f\154\144\x3b\142\x6f\162\144\x65\162\72\x32\x70\170\x20\x73\157\154\x69\144\x20\x23\x39\x34\71\x30\71\x30\x3b\160\141\x64\144\x69\x6e\x67\72\62\45\x3b\x22\x3e\101\124\x54\x52\x49\x42\125\124\105\40\116\x41\x4d\x45\74\57\164\x64\76\xd\xa\x20\x20\40\40\40\x20\40\40\x20\x20\40\x20\40\40\x20\40\40\x20\x20\40\40\x20\x20\x20\40\40\x20\40\x20\40\40\40\x20\40\40\40\x20\x20\x20\40\74\x74\x64\40\163\x74\171\x6c\145\75\42\x66\x6f\x6e\164\x2d\167\x65\x69\x67\x68\164\72\x62\157\x6c\144\73\x70\x61\144\144\x69\x6e\x67\72\62\45\73\x62\157\x72\x64\145\x72\x3a\x32\160\x78\40\163\157\154\151\x64\x20\x23\x39\64\71\x30\71\x30\x3b\x20\x77\157\162\x64\x2d\x77\162\141\160\x3a\x62\162\145\141\x6b\x2d\x77\x6f\162\144\73\42\76\101\x54\124\x52\x49\x42\125\x54\105\x20\126\x41\x4c\125\x45\x3c\57\x74\x64\x3e\xd\12\x20\40\40\40\x20\x20\40\40\40\x20\x20\x20\x20\40\x20\40\x20\x20\x20\40\40\40\40\40\40\x20\40\x20\x20\40\40\x20\40\40\40\x20\x3c\x2f\164\162\x3e\x7b\x7b\164\141\x62\x6c\145\143\x6f\156\164\145\156\164\175\x7d\xd\xa\x20\40\40\40\x20\x20\40\40\40\x20\x20\x20\40\40\x20\40\40\40\40\x20\40\x20\x20\40\40\x20\40\x20\x20\40\40\40\74\57\x74\x61\x62\154\145\x3e";
    private $exceptionBody = "\74\x64\151\x76\x20\163\x74\x79\154\145\75\42\x6d\141\162\x67\151\x6e\72\x20\61\60\160\x78\40\60\73\x70\x61\144\144\151\156\147\72\40\61\x32\x70\x78\x3b\x63\x6f\154\157\x72\72\x20\x23\x44\x38\x30\x30\60\103\73\142\141\143\x6b\x67\x72\157\165\x6e\144\55\143\157\x6c\x6f\x72\x3a\x20\43\x46\106\102\101\x42\x41\x3b\x66\x6f\x6e\x74\x2d\163\151\172\145\72\40\61\x36\x70\x78\x3b\xd\12\x20\x20\40\40\x20\x20\x20\40\40\x20\40\40\x20\x20\x20\x20\40\40\x20\x20\40\x20\x20\x20\40\40\40\40\40\x20\x20\x20\x6c\151\x6e\x65\x2d\x68\x65\x69\x67\x68\x74\x3a\40\x31\56\66\x31\x38\x3b\x22\76\x7b\x7b\145\170\x63\x65\x70\164\x69\157\156\155\x65\x73\163\141\147\145\x7d\175\x3c\x2f\144\x69\166\x3e\x7b\173\143\145\x72\164\x45\162\162\157\x72\x44\x69\166\x7d\x7d\173\x7b\x6f\141\x75\x74\150\122\x65\x73\160\157\x6e\x73\145\x44\151\166\x7d\x7d";
    private $oauthResponse = "\x3c\x70\40\x73\x74\171\154\x65\x3d\x22\x66\157\x6e\x74\55\x77\x65\151\x67\150\164\72\x62\157\x6c\x64\x3b\x66\x6f\x6e\164\x2d\x73\x69\x7a\x65\x3a\61\64\x70\164\73\155\141\x72\x67\x69\156\55\154\x65\x66\164\72\61\x25\x3b\x22\x3e\117\101\x55\x54\110\x20\122\105\x53\x50\x4f\x4e\x53\105\x20\x46\122\x4f\115\40\111\104\120\x3a\x3c\57\x70\76\74\x64\151\x76\x20\163\164\171\154\145\75\x22\143\x6f\x6c\157\x72\72\40\43\63\x37\x33\102\64\61\73\15\xa\x20\x20\40\x20\x20\x20\x20\40\40\x20\x20\40\40\x20\40\40\40\x20\x20\x20\x20\x20\x20\40\x20\x20\x20\40\40\40\40\40\146\x6f\156\164\55\x66\x61\x6d\x69\x6c\x79\72\x20\115\x65\x6e\154\x6f\x2c\115\157\x6e\141\143\x6f\54\103\157\x6e\163\x6f\154\x61\163\x2c\x6d\x6f\x6e\157\163\160\x61\x63\145\x3b\x64\x69\x72\x65\x63\x74\x69\x6f\x6e\x3a\x20\x6c\x74\x72\73\164\145\170\164\55\x61\154\151\x67\x6e\x3a\x20\154\145\x66\x74\x3b\167\x68\151\x74\145\x2d\x73\x70\x61\x63\145\x3a\40\160\x72\145\73\xd\12\40\40\x20\40\40\x20\x20\x20\x20\x20\x20\x20\x20\x20\40\x20\x20\x20\x20\40\40\40\x20\40\40\x20\x20\x20\x20\40\x20\40\x77\x6f\162\x64\x2d\163\x70\x61\143\151\156\147\x3a\40\x6e\157\162\155\141\x6c\x3b\167\x6f\x72\144\x2d\x62\x72\x65\x61\153\72\x20\156\157\162\x6d\x61\x6c\x3b\x66\x6f\x6e\x74\55\x73\x69\x7a\145\72\x20\61\63\x70\x78\x3b\146\157\156\x74\55\x73\164\x79\x6c\x65\x3a\40\156\157\162\155\x61\154\73\146\157\156\164\x2d\x77\145\x69\x67\x68\x74\x3a\x20\x34\60\x30\73\xd\xa\40\x20\x20\40\x20\40\40\40\x20\40\x20\x20\x20\40\40\x20\x20\40\x20\x20\x20\x20\40\x20\x20\40\x20\40\40\40\x20\x20\150\145\151\147\x68\164\x3a\40\141\x75\x74\157\73\x6c\x69\x6e\145\55\150\x65\151\147\150\x74\72\x20\x31\x39\56\65\x70\x78\x3b\142\x6f\x72\x64\145\x72\72\40\x31\x70\x78\40\163\157\x6c\x69\144\40\x23\x64\x64\x64\73\x62\x61\143\x6b\x67\162\x6f\165\156\144\72\x20\x23\146\x61\146\141\x66\x61\x3b\x70\141\x64\x64\x69\x6e\x67\72\40\61\x65\x6d\x3b\15\xa\x20\x20\x20\40\40\x20\x20\x20\40\x20\x20\x20\x20\40\40\x20\x20\40\40\40\40\40\40\x20\x20\x20\x20\40\x20\40\40\40\155\141\x72\x67\151\x6e\x3a\40\x2e\x35\x65\x6d\40\60\73\x62\x6f\x72\x64\x65\162\x2d\162\x61\x64\x69\165\x73\x3a\40\64\x70\170\x3b\157\166\x65\x72\146\154\x6f\x77\72\163\143\162\x6f\154\x6c\42\x3e\x7b\173\157\x61\x75\x74\x68\x72\x65\163\160\157\156\x73\145\x7d\175\74\x2f\x64\151\166\76";
    private $footer = "\40\x3c\144\151\166\40\163\x74\171\154\x65\75\42\x6d\x61\x72\147\151\156\72\63\x25\73\x64\151\x73\160\154\141\x79\x3a\x62\x6c\x6f\x63\x6b\x3b\164\x65\x78\x74\x2d\141\x6c\x69\147\156\72\143\145\x6e\164\145\x72\73\42\76\15\12\x20\40\x20\40\x20\x20\40\x20\40\x20\40\x20\x20\40\x20\x20\x20\x20\40\x20\x20\x20\x20\x20\40\40\40\40\x3c\x69\156\160\x75\164\40\163\x74\x79\154\145\x3d\x22\x70\141\144\144\x69\156\x67\x3a\x31\45\x3b\x77\151\144\x74\x68\x3a\x31\x30\x30\x70\x78\73\142\x61\143\x6b\x67\162\x6f\x75\156\x64\x3a\40\x23\x30\x30\71\x31\103\104\40\x6e\x6f\156\x65\x20\x72\x65\x70\145\x61\x74\40\163\143\x72\x6f\x6c\x6c\40\60\x25\x20\60\45\73\x63\x75\162\x73\x6f\162\72\40\160\x6f\151\x6e\164\145\162\x3b\xd\xa\x20\40\40\40\x20\40\40\40\x20\40\x20\40\40\40\40\40\x20\40\40\x20\40\x20\x20\x20\x20\x20\40\x20\x20\x20\x20\40\146\x6f\x6e\164\x2d\163\x69\x7a\x65\x3a\61\65\x70\170\x3b\x62\157\x72\144\x65\162\x2d\x77\151\x64\164\x68\x3a\40\x31\x70\x78\x3b\142\x6f\x72\x64\x65\162\55\x73\x74\x79\x6c\145\x3a\x20\x73\157\x6c\x69\144\x3b\x62\157\x72\x64\145\x72\55\162\141\x64\151\165\x73\72\40\x33\160\170\73\x77\x68\151\164\x65\55\x73\160\141\x63\x65\72\40\156\x6f\167\162\x61\160\73\15\xa\x20\40\x20\x20\40\x20\x20\40\x20\40\40\40\x20\x20\40\x20\x20\x20\40\x20\x20\x20\40\40\x20\40\x20\x20\x20\40\40\40\40\40\x20\x20\x62\157\x78\55\163\x69\x7a\151\156\x67\x3a\x20\x62\x6f\x72\x64\145\162\x2d\x62\157\x78\x3b\142\157\162\144\x65\162\55\x63\157\154\157\x72\x3a\40\x23\x30\60\x37\x33\x41\101\x3b\x62\x6f\170\55\163\x68\x61\144\x6f\167\72\x20\60\160\x78\40\x31\160\170\40\x30\x70\x78\40\x72\147\142\141\x28\x31\62\60\54\40\x32\x30\60\54\40\62\x33\x30\x2c\x20\x30\x2e\66\x29\40\x69\156\x73\145\164\73\15\xa\x20\40\x20\40\x20\40\x20\x20\40\x20\40\40\40\40\40\40\40\40\x20\x20\40\40\40\40\40\40\40\x20\40\x20\x20\x20\x20\x20\x20\x20\x63\157\154\157\162\x3a\40\x23\106\x46\106\x3b\42\x74\x79\160\x65\x3d\42\142\165\x74\164\x6f\x6e\42\40\x76\x61\154\165\145\75\42\x44\157\x6e\x65\42\40\157\156\103\154\151\143\153\75\x22\x73\x65\154\146\56\x63\154\157\163\145\50\x29\73\x22\76\x3c\57\144\151\x76\76";
    private $tableContent = "\74\164\x72\76\74\x74\144\x20\x73\164\x79\154\145\75\47\x66\157\156\164\55\x77\145\x69\x67\x68\x74\x3a\142\157\x6c\x64\73\x62\x6f\x72\x64\x65\162\72\x32\160\170\x20\x73\x6f\x6c\x69\144\40\x23\x39\64\71\x30\71\60\73\160\141\x64\x64\151\156\x67\72\62\x25\x3b\47\76\x7b\173\153\145\171\x7d\x7d\74\x2f\164\144\76\74\x74\144\x20\x73\164\171\x6c\145\x3d\47\160\141\x64\x64\x69\156\x67\72\62\x25\73\xd\12\40\40\x20\40\40\40\x20\40\x20\x20\x20\x20\x20\40\x20\40\x20\x20\x20\40\40\40\40\40\x20\x20\40\x20\x20\x20\x20\x20\x20\x20\x20\40\x62\157\x72\x64\x65\x72\72\x32\160\x78\40\163\x6f\154\x69\144\40\x23\71\64\71\60\x39\60\x3b\x20\x77\157\x72\x64\x2d\x77\162\x61\x70\72\x62\x72\x65\141\x6b\55\x77\x6f\x72\x64\73\x27\76\173\173\166\141\x6c\x75\x65\x7d\x7d\x3c\57\164\144\76\x3c\x2f\164\162\x3e";
    public function execute()
    {
        $this->oauthUtility->log_debug("\x53\150\x6f\167\x54\145\163\164\x52\145\x73\x75\x6c\164\101\x63\x74\x69\157\x6e\x20\x3a\x20\145\170\x65\x63\165\164\x65");
        if (!ob_get_contents()) {
            goto wA;
        }
        ob_end_clean();
        wA:
        $this->processTemplateHeader();
        if ($this->hasExceptionOccurred) {
            goto BX;
        }
        $this->processTemplateContent();
        BX:
        $this->processTemplateFooter();
        $this->getResponse()->setBody($this->template);
    }
    private function processTemplateHeader()
    {
        $this->oauthUtility->log_debug("\123\x68\x6f\167\x54\145\x73\x74\122\145\x73\165\154\164\163\x41\143\164\151\x6f\x6e\x20\x3a\40\x70\x72\x6f\143\x65\x73\x73\124\x65\x6d\x70\154\x61\x74\x65\x48\145\141\144\x65\x72");
        $Vs = $this->oauthUtility->isBlank($this->userEmail) ? $this->errorHeader : $this->successHeader;
        $Vs = str_replace("\x7b\x7b\162\x69\147\x68\x74\x7d\x7d", $this->oauthUtility->getImageUrl(OAuthConstants::IMAGE_RIGHT), $Vs);
        $Vs = str_replace("\173\173\x77\162\x6f\156\x67\175\175", $this->oauthUtility->getImageUrl(OAuthConstants::IMAGE_WRONG), $Vs);
        $this->template = str_replace("\x7b\x7b\x68\145\x61\144\x65\162\x7d\175", $Vs, $this->template);
    }
    private function processTemplateContent()
    {
        $this->commonBody = str_replace("\173\173\x65\x6d\x61\x69\x6c\x7d\175", $this->userEmail, $this->commonBody);
        $Zz = !array_filter($this->attrs) ? "\116\x6f\40\x41\164\164\x72\151\x62\165\x74\x65\x73\40\122\x65\x63\145\x69\x76\145\x64\56" : $this->getTableContent();
        $this->commonBody = str_replace("\173\173\x74\x61\142\x6c\x65\143\x6f\156\164\x65\156\x74\175\175", $Zz, $this->commonBody);
        $this->template = str_replace("\x7b\x7b\x63\x6f\155\155\157\x6e\x62\x6f\144\171\x7d\x7d", $this->commonBody, $this->template);
    }
    private function getTableContent()
    {
        $Zz = '';
        foreach ($this->attrs as $mx => $Vw) {
            if (is_array($Vw)) {
                goto w0;
            }
            $Vw = [$Vw];
            w0:
            if (in_array(null, $Vw)) {
                goto QS;
            }
            $Zz .= str_replace("\173\173\x6b\145\x79\175\x7d", $mx, str_replace("\x7b\173\166\141\x6c\x75\x65\x7d\x7d", implode("\x3c\142\162\x2f\x3e", $Vw), $this->tableContent));
            QS:
            aC:
        }
        KP:
        return $Zz;
    }
    private function processTemplateFooter()
    {
        $this->template = str_replace("\173\x7b\x66\x6f\157\x74\x65\162\x7d\175", $this->footer, $this->template);
    }
    public function setAttrs($HX)
    {
        $this->attrs = $HX;
        return $this;
    }
    public function setOAuthException($cZ)
    {
        $this->oauthException = $cZ;
        return $this;
    }
    public function setUserEmail($p6)
    {
        $this->userEmail = $p6;
        return $this;
    }
    public function setHasExceptionOccurred($YK)
    {
        $this->hasExceptionOccurred = $YK;
        return $this;
    }
}