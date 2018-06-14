<?php
/**
 * Tags controller.
 */
namespace Controller;

use Repository\TagsRepository;
use Silex\Application;
use Silex\Api\ControllerProviderInterface;

/**
 * Class TagsController.
 */
class TagsController implements ControllerProviderInterface
{
    /**
     * {@inheritdoc}
     */
    public function connect(Application $app)
    {
        $controller = $app['controllers_factory'];
        $controller->get('/', [$this, 'indexAction'])->bind('tags_index');
        $controller->get('/{id}', [$this, 'viewAction'])->bind('tags_view');

        return $controller;
    }

    /**
     * Index action.
     *
     * @param \Silex\Application $app Silex application
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     */
    public function indexAction(Application $app)
    {
        $tagsRepository = new TagsRepository($app['db']);

        return $app['twig']->render(
            'tags/index.html.twig',
            ['tags' => $tagsRepository->findAll()]
        );
    }

    /**
     * View action.
     *
     * @param \Silex\Application $app Silex application
     * @param string             $id  Element Id
     *
     * @return \Symfony\Component\HttpFoundation\Response HTTP Response
     */
    public function viewAction(Application $app, $id)
    {
        $tagsRepository = new TagsRepository($app['db']);

        return $app['twig']->render(
            'tags/view.html.twig',
            ['tag' => $tagsRepository->findOneById($id)]
        );
    }
}