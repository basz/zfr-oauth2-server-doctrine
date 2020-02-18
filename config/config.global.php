<?php

declare(strict_types=1);
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license.
 */

use Doctrine\ORM\Mapping\Driver\XmlDriver;
use ZfrOAuth2\Server\Doctrine\Subscriber\TokenOwnerPkColumnSubscriber;
use ZfrOAuth2\Server\Model\TokenOwnerInterface;

return [
    'doctrine' => [
        /**
         * Set the resolver. You should change the value to your user class (or any class that
         * implements the ZfrOAuth2/Server/Model/TokenOwnerInterface interface
         */
        'entity_resolver' => [
            'orm_default' => [
                'resolvers' => [
                    TokenOwnerInterface::class => My\Entity\User::class,
                ],
            ],
        ],
        'driver'          => [
            'zfr_oauth2_server_doctrine_driver' => [
                'class' => XmlDriver::class,
                'paths' => [__DIR__ . '/doctrine'],
            ],
            'orm_default'                       => [
                'drivers' => [
                    'ZfrOAuth2\Server\Model' => 'zfr_oauth2_server_doctrine_driver',
                ],
            ],
        ],

        'configuration' => [
            'orm_default' => [
//                'second_level_cache' => [
//                    'enabled' => true,
//
//                    'regions' => [
//                        'oauth_token_region' => [
//                            'lifetime' => 3600
//                        ],
//
//                        'oauth_scope_region' => [
//                            'lifetime' => 300
//                        ]
//                    ],
//                ],
            ],
        ],

        'eventmanager' => [
            'orm_default' => [
                'subscribers' => [
                    TokenOwnerPkColumnSubscriber::class,
                ],
            ],
        ],
    ],

    'zfr_oauth2_server_doctrine' => [
    /**
     *
     */
        // 'token_owner_pk_column' => 'id',
    ],
];
