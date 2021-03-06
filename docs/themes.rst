Themes
===============

Structure
---------

Themes provide templates for the customization of the appearance and functionality of your public-facing websites. Themes can also be translated to support multiple written languages and regional dialects.

The Superdesk Web Publisher themes system is built on top of fast, flexible and easy to use `Twig <http://twig.sensiolabs.org/>`_ templates.

By default, themes are located under the :code:`app/themes` directory. A basic theme must have the following structure:

.. code-block:: bash

    ExampleTheme/               <=== Theme starts here
        views/                  <=== Views directory
            home.html.twig
        translations/           <=== Translations directory
            messages.en.yml
        public/                 <=== Assets directory
            css/
            js/
            images/
        theme.json              <=== Theme configuration

Multitenancy
------------

Superdesk Web Publisher can serve many websites from one instance, and each website *tenant* can have multiple themes. The active theme for the tenant can be selected with a local settings file, or by API.

If only one tenant is used, which is the default, the theme should be placed under the :code:`app/themes/default` directory, (e.g. :code:`app/themes/default/ExampleTheme`).

If there were another tenant configured, for example :code:`client1`, the files for one of this tenant's themes could be placed under the :code:`app/themes/client1/ExampleTheme` directory.

Device-specific templates
-------------------------

Superdesk Web Publisher provides an easy way to create device-specific templates. This means you only need to put the elements in a particular template which are going to be used on the target device.

The suported device types are: :code:`desktop, phone, tablet, plain`.

A theme with device-specific templates could be structured like this:

.. code-block:: bash

    ExampleTheme/                   <=== Theme starts here
        phone                       <=== Views used on phones
            views/                  <=== Views directory
                home.html.twig
        tablet                      <=== Views used on tablets
            views/                  <=== Views directory
                home.html.twig
        views/                      <=== Default templates directory
            home.html.twig
        translations/               <=== Translations directory
            messages.en.yml
        public/                     <=== Assets directory
            css/
            js/
            images/
        theme.json                  <=== Theme configuration


.. note::

     If a device is not recognized by the Web Publisher, it will fall back to the :code:`desktop` type. If there is no :code:`desktop` directory with the required template file, the locator will try to load the template from the root level :code:`views` directory.

     More details about theme structure and configuration can be found in the `Sylius Theme Bundle documentation`_.

.. _Sylius Theme Bundle documentation: http://docs.sylius.org/en/latest/bundles/SyliusThemeBundle/your_first_theme.html
