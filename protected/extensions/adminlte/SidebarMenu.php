<?php
/**
 * Description of SidebarMenu
 *
 * @author satitseethaphon
 */
Yii::import('zii.widgets.CMenu');
 
class SidebarMenu extends CMenu {
 
    public function init() {
 
        $this->htmlOptions['class'] = 'sidebar-menu';
        $this->submenuHtmlOptions = array('class' => 'treeview-menu');
 
 
        parent::init();
    }
 
    public function renderMenuRecursive($items,$isSub=FALSE) {
        $count = 0;
        $n = count($items);
        foreach ($items as $item) {
            $count++;
            $options = isset($item['itemOptions']) ? $item['itemOptions'] : array();
            $isSubmenu = (isset($item['items']) && count($item['items']));
            $class = array();
            if ($item['active'] && $this->activeCssClass != '')
                $class[] = $this->activeCssClass;
            if ($count === 1 && $this->firstItemCssClass !== null)
                $class[] = $this->firstItemCssClass;
            if ($count === $n && $this->lastItemCssClass !== null)
                $class[] = $this->lastItemCssClass;
            if ($this->itemCssClass !== null)
                $class[] = $this->itemCssClass;
            if ($isSubmenu) {
                $class[] = 'treeview';
            }
            if ($class !== array()) {
                if (empty($options['class']))
                    $options['class'] = implode(' ', $class);
                else
                    $options['class'].=' ' . implode(' ', $class);
            }
 
 
            echo CHtml::openTag('li', $options);
            
            $menu = $this->renderMenuItem($item,$isSub);
            
            if (isset($this->itemTemplate) || isset($item['template'])) {
                $template = isset($item['template']) ? $item['template'] : $this->itemTemplate;
                echo strtr($template, array('{menu}' => $menu));
            } else
                echo $menu;
 
            if ($isSubmenu) {
                echo "\n" . CHtml::openTag('ul', isset($item['submenuOptions']) ? $item['submenuOptions'] : $this->submenuHtmlOptions) . "\n";
                $this->renderMenuRecursive($item['items'],TRUE);
                echo CHtml::closeTag('ul') . "\n";
            }
 
            echo CHtml::closeTag('li') . "\n";
        }
    }
 
    public function renderMenuItem($item,$isSub=FALSE) {
        if (isset($item['icon'])) {
            if (strpos($item['icon'], 'icon') === false && strpos($item['icon'], 'fa') === false) {
                $item['icon'] = 'glyphicon glyphicon-' . implode(' glyphicon-', explode(' ', $item['icon']));
                $item['label'] = "<span class='" . $item['icon'] . "'></span>\r\n" . $item['label'];
            } else {
                $item['label'] = "<i class='" . $item['icon'] . "'></i>\r\n" . $item['label'];
            }
        }
        
       $item['label'] = ($isSub===TRUE)?'<i class="fa fa-angle-double-right"></i>'.$item['label']:$item['label'];
 
       if (isset($item['items']) && !empty($item['items'])) {
           $item['label'] .= '<i class="fa fa-angle-left pull-right"></i>';
       }
       if(isset($item['bage'])){
           $item['label'] .= $item['bage'];
       }
       
        if (isset($item['url'])) {
            $label = $this->linkLabelWrapper === null ? $item['label'] : CHtml::tag($this->linkLabelWrapper, $this->linkLabelWrapperHtmlOptions, $item['label']);
            return CHtml::link($label, $item['url'], isset($item['linkOptions']) ? $item['linkOptions'] : array());
        } else
            return CHtml::tag('span', isset($item['linkOptions']) ? $item['linkOptions'] : array(), $item['label']);
    }
 
}
?>