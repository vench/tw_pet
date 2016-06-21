<?php

 
namespace app;

/**
 * Description of AppConfig
 *
 * @author vench
 * @todo реализовать стратегию загрузки конфигурации приложения
 */
class AppConfig {
 
    
    private $config = [
        'defaultPage' => 'page',
    ];
    
    /**
     * 
     * @param string $name
     * @param mixed $default
     * @return mixed
     */
    public function getValue($name, $default = null) {
        return  isset($this->config[$name]) ? $this->config[$name] : $default;
    }
}
