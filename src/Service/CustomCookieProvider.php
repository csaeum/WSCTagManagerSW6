<?php declare(strict_types=1);

namespace WSC\TagManagerSW6\Service;

use Shopware\Storefront\Framework\Cookie\CookieProviderInterface;

class CustomCookieProvider implements CookieProviderInterface {

    private $originalService;

    public function __construct(CookieProviderInterface $service)
    {
        $this->originalService = $service;
    }

    // cookies can also be provided as a group
    private const cookieGroup = [
        'snippet_name' => 'cookie.groupStatistical',
        'snippet_description' => 'cookie.groupStatisticalDescription',
        'entries' => [
            [
                'snippet_name' => 'cookie.Bing',
                'snippet_description' => 'cookie.BingDescription',
                'cookie' => 'wsc_Cookie_Bing',
                'expiration' => '360',
                'value' => '1',
            ],
            [
                'snippet_name' => 'cookie.Clarity',
                'snippet_description' => 'cookie.ClarityDescription',
                'cookie' => 'wsc_Cookie_Clarity',
                'expiration' => '360',
                'value' => '1',
            ],
            [
                'snippet_name' => 'cookie.Facebook',
                'snippet_description' => 'cookie.FacebookDescription',
                'cookie' => 'wsc_Cookie_Facebook',
                'expiration' => '360',
                'value' => '1',
            ],
            [
                'snippet_name' => 'cookie.Google',
                'snippet_description' => 'cookie.GoogleDescription',
                'cookie' => 'wsc_Cookie_Google',
                'expiration' => '360',
                'value' => '1',
            ],
            [
                'snippet_name' => 'cookie.GoogleADs',
                'snippet_description' => 'cookie.GoogleADsDescription',
                'cookie' => 'wsc_Cookie_GoogleADs',
                'expiration' => '360',
                'value' => '1',
            ],
            [
                'snippet_name' => 'cookie.Hotjar',
                'snippet_description' => 'cookie.HotjarDescription',
                'cookie' => 'wsc_Cookie_Hotjar',
                'expiration' => '360',
                'value' => '1',
            ],
            [
                'snippet_name' => 'cookie.Instagram',
                'snippet_description' => 'cookie.InstagramDescription',
                'cookie' => 'wsc_Cookie_Instagram',
                'expiration' => '360',
                'value' => '1',
            ],
            [
                'snippet_name' => 'cookie.Matomo',
                'snippet_description' => 'cookie.MatomoDescription',
                'cookie' => 'wsc_Cookie_Matomo',
                'expiration' => '360',
                'value' => '1',
            ],
            [
                'snippet_name' => 'cookie.Mautic',
                'snippet_description' => 'cookie.MauticDescription',
                'cookie' => 'wsc_Cookie_Mautic',
                'expiration' => '360',
                'value' => '1',
            ],
            [
                'snippet_name' => 'cookie.Pinterest',
                'snippet_description' => 'cookie.PinterestDescription',
                'cookie' => 'wsc_Cookie_Pinterest',
                'expiration' => '360',
                'value' => '1',
            ],
            [
                'snippet_name' => 'cookie.Youtube',
                'snippet_description' => 'cookie.YoutubeDescription',
                'cookie' => 'wsc_Cookie_Youtube',
                'expiration' => '360',
                'value' => '1',
            ],
            [
                'snippet_name' => 'cookie.Zammad',
                'snippet_description' => 'cookie.ZammadDescription',
                'cookie' => 'wsc_Cookie_Zammad',
                'expiration' => '360',
                'value' => '1',
            ]
        ],
    ];

    public function getCookieGroups(): array
    {
        $cookieGroups = $this->originalService->getCookieGroups();

        foreach ($cookieGroups as $key => $group) {
            if ($group['snippet_name'] === self::cookieGroup['snippet_name']) {
                $cookieGroups[$key]['entries'] = array_merge(
                    $group['entries'], self::cookieGroup['entries']
                );
                return $cookieGroups;
            }
        }

        return array_merge(
            $cookieGroups,
            [
                self::cookieGroup
            ]
        );
    }
}