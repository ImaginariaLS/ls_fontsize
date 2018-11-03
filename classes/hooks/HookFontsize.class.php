<?php
/*
  Fontsize plugin
  (P) PSNet, 2008 - 2013
  http://psnet.lookformp3.net/
  http://livestreet.ru/profile/PSNet/
  http://livestreetcms.com/profile/PSNet/
  http://livestreetguide.com/developer/PSNet/
*/

class PluginFontsize_HookFontsize extends Hook
{

    public function RegisterHook()
    {
        $this->AddHook('engine_init_complete', 'EngineInitComplete');
        $this->AddHook('template_topic_content_begin', 'TopicContent');
        $this->AddHook('template_topic_content_end', 'TopicContent');
        $this->AddHook('template_footer_end', 'FooterEnd');
    }

    // ---

    public function EngineInitComplete()
    {
        // add CSS and JS
        $sTemplateWebPath = Plugin::GetTemplateWebPath(__CLASS__);
        $this->Viewer_AppendStyle($sTemplateWebPath . 'css/style.css');
        $this->Viewer_AppendScript($sTemplateWebPath . 'js/init.js');
    }

    // ---

    public function TopicContent()
    {
        return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__) . 'topic_content.tpl');
    }

    // ---

    public function FooterEnd()
    {
        return $this->Viewer_Fetch(Plugin::GetTemplatePath(__CLASS__) . 'footer_end.tpl');
    }

}
