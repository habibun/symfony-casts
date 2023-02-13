<?php

namespace AppBundle\Security;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Authorization\Voter\AbstractVoter;
use Symfony\Component\Security\Core\User\UserInterface;

class CookieVoter extends AbstractVoter
{
    const ATTRIBUTE_NOM = 'NOM';
    const ATTRIBUTE_DONATE = 'DONATE';

    private $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Return an array of supported classes. This will be called by supportsClass
     *
     * @return array    an array of supported classes, i.e. array('Acme\DemoBundle\Model\Product')
     */
    protected function getSupportedClasses()
    {
        return array('AppBundle\Entity\DeliciousCookie');
    }

    /**
     * Return an array of supported attributes. This will be called by supportsAttribute
     *
     * @return array    an array of supported attributes, i.e. array('CREATE', 'READ')
     */
    protected function getSupportedAttributes()
    {
        return array(self::ATTRIBUTE_NOM, self::ATTRIBUTE_DONATE);
    }

    /**
     * Perform a single access check operation on a given attribute, object and (optionally) user
     * It is safe to assume that $attribute and $object's class pass supportsAttribute/supportsClass
     * $user can be one of the following:
     *   a UserInterface object (fully authenticated user)
     *   a string               (anonymously authenticated user)
     *
     * @param string $attribute
     * @param object $object
     * @param UserInterface|string $user
     *
     * @return bool
     */
    protected function isGranted($attribute, $object, $user = null)
    {
        if (!$user) {
            return false;
        }

        $authChecker = $this->container->get('security.authorization_checker');

        switch ($attribute) {
            case self::ATTRIBUTE_NOM:
                if ($authChecker->isGranted('ROLE_COOKIE_MONSTER')) {
                    return true;
                }

                if ($object->getBakerUsername() == $user->getUsername()) {
                    return true;
                }

                return false;
            case self::ATTRIBUTE_DONATE:
                return stripos($object->getFlavor(), 'chocolate') === false;
        }

        throw new \LogicException('How did we get here!?');
    }

} 