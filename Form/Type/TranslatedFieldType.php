<?php
 
namespace CelciusTech\TranslatorBundle\Form\Type;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use CelciusTech\TranslatorBundle\Form\EventListener\AddTranslatedFieldSubscriber;
 
class TranslatedFieldType extends AbstractType
{
    protected $container;
 
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
 
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $subscriber = new AddTranslatedFieldSubscriber($builder->getFormFactory(), $this->container, $options);
        $builder->addEventSubscriber($subscriber);
    }
 
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'remove_empty' => true, //Personal Translations without content are removed
            'csrf_protection' => false, 
            'personal_translation' => false, //Personal Translation class
            'locales' => false, //the locales you wish to edit
            'required_locale' => array($this->container->getParameter('locale')), //the required locales cannot be blank
            'field' => false,
            'widget' => "text", //change this to another widget like 'texarea' if needed
            'entity_manager_removal' => true, //auto removes the Personal Translation thru entity manager
            'language_repository' => false,
        ));
    }
 
    public function getName()
    {
        return 'translatable_field';
    }
}
