<?php

namespace Rmzamora\CalendarBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * @author Richard Shank <develop@zestic.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * Generates the configuration tree.
     *
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('rmzamora_calendar');
        $rootNode
            ->children()
                ->scalarNode('db_driver')->cannotBeOverwritten()->isRequired()->cannotBeEmpty()->end()

                ->arrayNode('class')->isRequired()
                    ->children()
                        ->arrayNode('model')
                            ->children()
                                ->scalarNode('calendar')->isRequired()->end()
                                ->scalarNode('event')->isRequired()->end()
                                ->scalarNode('user')->isRequired()->end()
                                ->scalarNode('attendee')->isRequired()->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()

                ->arrayNode('form')->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('calendar')->isRequired()->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('type')->defaultValue('rmzamora_calendar.calendar')->end()
                                ->scalarNode('name')->defaultValue('rmzamora_calendar_calendar')->end()
                            ->end()
                        ->end()
                        ->arrayNode('event')->isRequired()->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('type')->defaultValue('rmzamora_calendar.event')->end()
                                ->scalarNode('name')->defaultValue('rmzamora_calendar_event')->end()
                            ->end()
                        ->end()
                        ->arrayNode('attendee')->isRequired()->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('type')->defaultValue('rmzamora_calendar.attendee')->end()
                                ->scalarNode('name')->defaultValue('rmzamora_calendar_attendee')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()

                ->arrayNode('routing')->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('calendar')->isRequired()->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('list')->defaultValue('rmzamora_calendar_list')->end()
                                ->scalarNode('add')->defaultValue('rmzamora_calendar_add')->end()
                                ->scalarNode('show')->defaultValue('rmzamora_calendar_show')->end()
                                ->scalarNode('edit')->defaultValue('rmzamora_calendar_edit')->end()
                                ->scalarNode('delete')->defaultValue('rmzamora_calendar_delete')->end()
                            ->end()
                        ->end()
                        ->arrayNode('event')->isRequired()->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('list')->defaultValue('rmzamora_calendar_event_list')->end()
                                ->scalarNode('add')->defaultValue('rmzamora_calendar_event_add')->end()
                                ->scalarNode('show')->defaultValue('rmzamora_calendar_event_show')->end()
                                ->scalarNode('edit')->defaultValue('rmzamora_calendar_event_edit')->end()
                                ->scalarNode('delete')->defaultValue('rmzamora_calendar_event_delete')->end()
                            ->end()
                        ->end()
                        ->arrayNode('attendee')->isRequired()->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('list')->defaultValue('rmzamora_calendar_attendee_list')->end()
                                ->scalarNode('add')->defaultValue('rmzamora_calendar_attendee_add')->end()
                                ->scalarNode('show')->defaultValue('rmzamora_calendar_attendee_show')->end()
                                ->scalarNode('edit')->defaultValue('rmzamora_calendar_attendee_edit')->end()
                                ->scalarNode('delete')->defaultValue('rmzamora_calendar_attendee_delete')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()

                ->arrayNode('service')->addDefaultsIfNotSet()
                    ->children()
                        ->arrayNode('blamer')->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('calendar')->cannotBeEmpty()->defaultValue('rmzamora_calendar.blamer.calendar.security')->end()
                                ->scalarNode('event')->cannotBeEmpty()->defaultValue('rmzamora_calendar.blamer.event.security')->end()
                                ->scalarNode('attendee')->cannotBeEmpty()->defaultValue('rmzamora_calendar.blamer.attendee.security')->end()
                            ->end()
                        ->end()
                        ->arrayNode('creator')->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('calendar')->cannotBeEmpty()->defaultValue('rmzamora_calendar.creator.calendar.default')->end()
                                ->scalarNode('event')->cannotBeEmpty()->defaultValue('rmzamora_calendar.creator.event.default')->end()
                                ->scalarNode('attendee')->cannotBeEmpty()->defaultValue('rmzamora_calendar.creator.attendee.default')->end()
                            ->end()
                        ->end()
                        ->arrayNode('form_factory')->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('calendar')->cannotBeEmpty()->defaultValue('rmzamora_calendar.form_factory.calendar.default')->end()
                                ->scalarNode('event')->cannotBeEmpty()->defaultValue('rmzamora_calendar.form_factory.event.default')->end()
                                ->scalarNode('attendee')->cannotBeEmpty()->defaultValue('rmzamora_calendar.form_factory.attendee.default')->end()
                            ->end()
                        ->end()
                        ->arrayNode('manager')->addDefaultsIfNotSet()
                            ->children()
                                ->scalarNode('calendar')->cannotBeEmpty()->defaultValue('rmzamora_calendar.manager.calendar.default')->end()
                                ->scalarNode('event')->cannotBeEmpty()->defaultValue('rmzamora_calendar.manager.event.default')->end()
                                ->scalarNode('user')->cannotBeEmpty()->defaultValue('rmzamora_calendar.manager.user.default')->end()
                                ->scalarNode('attendee')->cannotBeEmpty()->defaultValue('rmzamora_calendar.manager.attendee.default')->end()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
