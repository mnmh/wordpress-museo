<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb65ce4438b92afd3ec5db68b6f5feb54
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'Google\\Web_Stories\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Google\\Web_Stories\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
        ),
    );

    public static $classMap = array (
        'Google\\Web_Stories\\Activation_Flag' => __DIR__ . '/../..' . '/includes/Activation_Flag.php',
        'Google\\Web_Stories\\Activation_Notice' => __DIR__ . '/../..' . '/includes/Activation_Notice.php',
        'Google\\Web_Stories\\Admin' => __DIR__ . '/../..' . '/includes/Admin.php',
        'Google\\Web_Stories\\Analytics' => __DIR__ . '/../..' . '/includes/Analytics.php',
        'Google\\Web_Stories\\Dashboard' => __DIR__ . '/../..' . '/includes/Dashboard.php',
        'Google\\Web_Stories\\Database_Upgrader' => __DIR__ . '/../..' . '/includes/Database_Upgrader.php',
        'Google\\Web_Stories\\Demo_Content' => __DIR__ . '/../..' . '/includes/Demo_Content.php',
        'Google\\Web_Stories\\Discovery' => __DIR__ . '/../..' . '/includes/Discovery.php',
        'Google\\Web_Stories\\Embed_Block' => __DIR__ . '/../..' . '/includes/Embed_Block.php',
        'Google\\Web_Stories\\Experiments' => __DIR__ . '/../..' . '/includes/Experiments.php',
        'Google\\Web_Stories\\Fonts' => __DIR__ . '/../..' . '/includes/Fonts.php',
        'Google\\Web_Stories\\KSES' => __DIR__ . '/../..' . '/includes/KSES.php',
        'Google\\Web_Stories\\Media' => __DIR__ . '/../..' . '/includes/Media.php',
        'Google\\Web_Stories\\Model\\Story' => __DIR__ . '/../..' . '/includes/Model/Story.php',
        'Google\\Web_Stories\\Plugin' => __DIR__ . '/../..' . '/includes/Plugin.php',
        'Google\\Web_Stories\\REST_API\\Embed_Controller' => __DIR__ . '/../..' . '/includes/REST_API/Embed_Controller.php',
        'Google\\Web_Stories\\REST_API\\Fonts_Controller' => __DIR__ . '/../..' . '/includes/REST_API/Fonts_Controller.php',
        'Google\\Web_Stories\\REST_API\\Link_Controller' => __DIR__ . '/../..' . '/includes/REST_API/Link_Controller.php',
        'Google\\Web_Stories\\REST_API\\Stories_Autosaves_Controller' => __DIR__ . '/../..' . '/includes/REST_API/Stories_Autosaves_Controller.php',
        'Google\\Web_Stories\\REST_API\\Stories_Base_Controller' => __DIR__ . '/../..' . '/includes/REST_API/Stories_Base_Controller.php',
        'Google\\Web_Stories\\REST_API\\Stories_Controller' => __DIR__ . '/../..' . '/includes/REST_API/Stories_Controller.php',
        'Google\\Web_Stories\\REST_API\\Stories_Media_Controller' => __DIR__ . '/../..' . '/includes/REST_API/Stories_Media_Controller.php',
        'Google\\Web_Stories\\Settings' => __DIR__ . '/../..' . '/includes/Settings.php',
        'Google\\Web_Stories\\Story_Post_Type' => __DIR__ . '/../..' . '/includes/Story_Post_Type.php',
        'Google\\Web_Stories\\Story_Renderer\\Embed' => __DIR__ . '/../..' . '/includes/Story_Renderer/Embed.php',
        'Google\\Web_Stories\\Story_Renderer\\HTML' => __DIR__ . '/../..' . '/includes/Story_Renderer/HTML.php',
        'Google\\Web_Stories\\Story_Renderer\\Image' => __DIR__ . '/../..' . '/includes/Story_Renderer/Image.php',
        'Google\\Web_Stories\\Template_Post_Type' => __DIR__ . '/../..' . '/includes/Template_Post_Type.php',
        'Google\\Web_Stories\\Tracking' => __DIR__ . '/../..' . '/includes/Tracking.php',
        'Google\\Web_Stories\\Traits\\Assets' => __DIR__ . '/../..' . '/includes/Traits/Assets.php',
        'Google\\Web_Stories\\Traits\\Document_Parser' => __DIR__ . '/../..' . '/includes/Traits/Document_Parser.php',
        'Google\\Web_Stories\\Traits\\Publisher' => __DIR__ . '/../..' . '/includes/Traits/Publisher.php',
        'Google\\Web_Stories\\Traits\\Types' => __DIR__ . '/../..' . '/includes/Traits/Types.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb65ce4438b92afd3ec5db68b6f5feb54::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb65ce4438b92afd3ec5db68b6f5feb54::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitb65ce4438b92afd3ec5db68b6f5feb54::$classMap;

        }, null, ClassLoader::class);
    }
}
