<?php

namespace Chaplean\Bundle\BonuslyClientBundle\Api;

use Chaplean\Bundle\RestClientBundle\Api\AbstractApi;
use Chaplean\Bundle\RestClientBundle\Api\Parameter;
use Chaplean\Bundle\RestClientBundle\Api\RequestRoute;
use Chaplean\Bundle\RestClientBundle\Api\Route;
use GuzzleHttp\ClientInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class BonuslyApi
 *
 * @method Route        getUsers()
 * @method Route        getCompanies()
 * @method Route        getLeaderboards()
 * @method Route        getBonuses()
 *
 * @method RequestRoute postBonuses()
 * @method RequestRoute postUsers()
 *
 * @method RequestRoute putCompanies()
 * @method RequestRoute putUsers()
 *
 * @method Route        deleteUsers()
 *
 * @author    Hugo - Chaplean <hugo@chaplean.coop>
 * @copyright 2014 - 2017 Chaplean (http://www.chaplean.coop)
 * @since     1.0.0
 */
class BonuslyApi extends AbstractApi
{
    /**
     * @var string
     */
    protected $url;

    /**
     * @var null|string
     */
    protected $token;

    /**
     * Bonusly constructor.
     *
     * @param ClientInterface          $caller
     * @param EventDispatcherInterface $eventDispatcher
     * @param string                   $url
     * @param string|null              $accessToken
     */
    public function __construct(ClientInterface $caller, EventDispatcherInterface $eventDispatcher, string $url, string $accessToken = null)
    {
        $this->token = $accessToken;
        $this->url = $url;
        parent::__construct($caller, $eventDispatcher);
    }

    /**
     * Set api actions.
     *
     * @return void
     */
    public function buildApi()
    {
        $this->globalParameters()
            ->urlPrefix($this->url)
            ->queryParameters(
                [
                    'access_token' => Parameter::string()
                        ->defaultValue($this->token),
                ]
            );

        $this->get('users', 'users');

        $this->get('companies', 'companies/show');

        $this->get('leaderboards', 'analytics/standouts')
            ->queryParameters(
                [
                    'access_token'          => Parameter::string()
                        ->defaultValue($this->token),
                    'role'                  => Parameter::string()
                        ->optional(),
                    'value'                 => Parameter::string()
                        ->optional(),
                    'custom_property_name'  => Parameter::string()
                        ->optional(),
                    'custom_property_value' => Parameter::string()
                        ->optional(),
                ]
            );

        $this->get('bonuses', 'bonuses')
            ->queryParameters(
                [
                    'access_token'   => Parameter::string()
                        ->defaultValue($this->token),
                    'limit'          => Parameter::int()
                        ->optional(), // min 1 , max 500
                    'start_time'     => Parameter::string()
                        ->optional(),
                    'end_time'       => Parameter::string()
                        ->optional(),
                    'giver_email'    => Parameter::string()
                        ->optional(),
                    'receiver_email' => Parameter::string()
                        ->optional(),
                    'user_email'     => Parameter::string()
                        ->optional(),
                    'hashtag'        => Parameter::string()
                        ->optional(),
                ]
            );

        $this->post('bonuses', 'bonuses')
            ->queryParameters(
                [
                    'access_token'   => Parameter::string()
                        ->defaultValue($this->token),
                    'amount'         => Parameter::int(),
                    'reason'         => Parameter::string(),
                    'receiver_email' => Parameter::string()
                ]
            );

        $this->post('users', 'users')
            ->queryParameters(
                [
                    'access_token'       => Parameter::string()
                        ->defaultValue($this->token),
                    'email'              => Parameter::string(),
                    'first_name'         => Parameter::string(),
                    'last_name'          => Parameter::string(),
                    'user_mode'          => Parameter::string()
                        ->optional(),
                    'external_unique_id' => Parameter::string()
                        ->optional(),
                    'budget_boost'       => Parameter::int()
                        ->optional(),
                    'custom_properties'  => Parameter::object([])
                        ->optional(),

                ]
            );

        $this->put('companies', 'companies/update')
            ->queryParameters(
                [
                    'access_token'           => Parameter::string()
                        ->defaultValue($this->token),
                    'name'                   => Parameter::string()
                        ->optional(),
                    'custom_user_properties' => Parameter::arrayList(Parameter::string()/*->values(['department', 'location'])*/)
                        ->optional(),
                ]
            );

        $this->put('users', 'users/{id}')
            ->urlParameters(
                [
                    'id' => Parameter::string()
                ]
            )
            ->queryParameters(
                [
                    'access_token'       => Parameter::string()
                        ->defaultValue($this->token),
                    'email'              => Parameter::string()
                        ->optional(),
                    'first_name'         => Parameter::string()
                        ->optional(),
                    'last_name'          => Parameter::string()
                        ->optional(),
                    'user_mode'          => Parameter::string()
                        ->optional(),
                    'external_unique_id' => Parameter::string()
                        ->optional(),
                    'budget_boost'       => Parameter::int()
                        ->optional(),
                    'custom_properties'  => Parameter::object([])
                        ->optional(),
                ]
            );

        $this->delete('users', 'users/{id}')
            ->urlParameters(
                [
                    'id' => Parameter::string()
                ]
            );
    }
}
