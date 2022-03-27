<?php
global $MESS;
$strPath2Lang = str_replace("\\", "/", __FILE__);
$strPath2Lang = substr($strPath2Lang, 0, strlen($strPath2Lang) - 18);
@include(GetLangFileName($strPath2Lang."/lang/", "/install/index.php"));
IncludeModuleLangFile($strPath2Lang."/install/index.php");

class complex_prop extends CModule
{
    const MODULE_ID = 'complex.prop';
    var $MODULE_ID = 'complex.prop';
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;
	var $MODULE_GROUP_RIGHTS = 'N';
    var $PARTNER_NAME;
    var $PARTNER_URI;
    
    function complex_prop()
	{
		$arModuleVersion = array();

		$path = str_replace("\\", "/", __FILE__);
		$path = substr($path, 0, strlen($path) - strlen("/index.php"));
		include($path."/version.php");

		$this->MODULE_VERSION = $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];

		$this->MODULE_NAME = GetMessage("SMCP_MODULE_NAME");
		$this->MODULE_DESCRIPTION = GetMessage("SMCP_MODULE_DESCRIPTION");
        
        $this->PARTNER_NAME = "COMPLEX";
        $this->PARTNER_URI = "https://asdaff.github.io/";
	}
    
    public function DoInstall()
    {
        if(!IsModuleInstalled("complex.prop"))
        {
            RegisterModule("complex.prop");
			
			RegisterModuleDependences("iblock", "OnIBlockPropertyBuildList", "complex.prop", "CCustomTypeComplexProperty", "GetUserTypeDescription");
			RegisterModuleDependences("main", "OnBeforeProlog", "complex.prop", "CIBEditComplexProp", "OnBeforePrologHandler");
			RegisterModuleDependences("iblock", "OnStartIBlockElementAdd", "complex.prop", "CIBEditComplexProp", "OnStartIBlockElementUpdateHandler");
			RegisterModuleDependences("iblock", "OnStartIBlockElementUpdate", "complex.prop", "CIBEditComplexProp", "OnStartIBlockElementUpdateHandler");
			RegisterModuleDependences("iblock", "OnBeforeIBlockElementAdd", "complex.prop", "CIBEditComplexProp", "OnBeforeIBlockElementUpdateHandler");
			RegisterModuleDependences("iblock", "OnBeforeIBlockElementUpdate", "complex.prop", "CIBEditComplexProp", "OnBeforeIBlockElementUpdateHandler");
			RegisterModuleDependences("iblock", "OnAfterIBlockElementAdd", "complex.prop", "CIBEditComplexProp", "OnAfterIBlockElementUpdateHandler");
			RegisterModuleDependences("iblock", "OnAfterIBlockElementUpdate", "complex.prop", "CIBEditComplexProp", "OnAfterIBlockElementUpdateHandler");
        }
        return true;
    }    
    
	function DoUninstall()
	{
		global $APPLICATION,$DB;
		
		UnRegisterModuleDependences("iblock", "OnIBlockPropertyBuildList", "complex.prop", "CCustomTypeComplexProperty", "GetUserTypeDescription");
		UnRegisterModuleDependences("main", "OnBeforeProlog", "complex.prop", "CIBEditComplexProp", "OnBeforePrologHandler");
		UnRegisterModuleDependences("iblock", "OnStartIBlockElementAdd", "complex.prop", "CIBEditComplexProp", "OnStartIBlockElementUpdateHandler");
		UnRegisterModuleDependences("iblock", "OnStartIBlockElementUpdate", "complex.prop", "CIBEditComplexProp", "OnStartIBlockElementUpdateHandler");
		UnRegisterModuleDependences("iblock", "OnBeforeIBlockElementAdd", "complex.prop", "CIBEditComplexProp", "OnBeforeIBlockElementUpdateHandler");
		UnRegisterModuleDependences("iblock", "OnBeforeIBlockElementUpdate", "complex.prop", "CIBEditComplexProp", "OnBeforeIBlockElementUpdateHandler");
		UnRegisterModuleDependences("iblock", "OnAfterIBlockElementAdd", "complex.prop", "CIBEditComplexProp", "OnAfterIBlockElementUpdateHandler");
		UnRegisterModuleDependences("iblock", "OnAfterIBlockElementUpdate", "complex.prop", "CIBEditComplexProp", "OnAfterIBlockElementUpdateHandler");
		
		UnRegisterModule("complex.prop");
		
		return true;			
	}
    
    public function InstallDB()
	{
		return true;
	}
    
    public function UninstallDB()
	{
		return true;
	}
    
    public function InstallFiles()
	{
		return true;
	}
    
    public function UninstallFiles()
	{
		return true;
	}
}
?>
