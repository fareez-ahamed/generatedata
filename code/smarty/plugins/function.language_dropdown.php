<?php

/**
 * Displays the interface language dropdown. The onchange event is attached in general.js.
 *
 * @param array $params
 * @param object $smarty
 */
function smarty_function_language_dropdown($params, &$smarty)
{
	// default to whatever is explicitly supplied. Failing that, default to the global var
	$default_language = isset($params["default"]) ? $params["default"] : $g_language;
	$name_id = isset($params["name_id"]) ? $params["name_id"] : "";

	$options = "";
  while (list($file, $language) = each(Core::$translations))
  {
    $value = preg_replace("/\.php$/", "", $file);
    $selected = ($value == Core::$language) ? " selected" : "";
    $options .= "<option value=\"{$value}\"{$selected}>{$language}</option>\n";
  }

  $please_select = Core::$L["select_language"];
  echo <<<END
    <select name="$name_id" id="$name_id">
      <option value="">$please_select</option>
      {$options}
    </select>
END;
}