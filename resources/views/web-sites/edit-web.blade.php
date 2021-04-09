<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CCXC</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet"/>
    <link href="https://unpkg.com/grapesjs/dist/css/grapes.min.css" rel="stylesheet">
    <link href="/css/grapesjs-plugin-filestack.css" rel="stylesheet">
</head>
<body>

<div id="gjs"></div>

<script src="/js/grapes.min.js" defer></script>
<script src="/js/grapesjs-blocks-basic.min.js" defer></script>
<script src="/js/grapesjs-plugin-forms.min.js" defer></script>
<script src="/js/grapesjs-navbar.min.js" defer></script>
<script src="/js/grapesjs-component-countdown.min.js" defer></script>
<script src="/js/grapesjs-style-gradient.min.js" defer></script>
<script src="/js/grapesjs-plugin-export.min.js" defer></script>
<script src="/js/grapesjs-tui-image-editor.min.js" defer></script>
<script src="/js/grapesjs-style-filter.min.js" defer></script>
<script src="/js/grapesjs-style-bg.min.js" defer></script>
<script src="/js/lory.min.js" defer></script>
<script src="/js/grapesjs-lory-slider.min.js" defer></script>
<script src="/js/grapesjs-tabs.min.js" defer></script>
<script src="/js/grapesjs-tooltip.min.js" defer></script>
<script src="/js/grapesjs-touch.min.js" defer></script>
<script src="/js/grapesjs-parser-postcss.min.js" defer></script>
{{--        <script src="https://feather.aviary.com/imaging/v3/editor.js" defer></script>--}}
{{--        <script src="/js/grapesjs-aviary.min.js" defer></script>--}}
{{--        <script src="/js/grapesjs-plugin-filestack.min.js" defer></script>--}}

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        const filterInput = {
            name: 'Filter',
            property: 'filter',
            type: 'filter', // <- the new type
            full: 1,
        };

        const editor = grapesjs.init({
            container : '#gjs',
            components: '{!! $website->body !!}',
            style: '{{ $website->styles }}',
            plugins: [
                "gjs-blocks-basic",
                'grapesjs-plugin-forms',
                'gjs-navbar',
                'gjs-component-countdown',
                'grapesjs-style-gradient',
                'grapesjs-plugin-export',
                'grapesjs-tui-image-editor',
                'grapesjs-style-filter',
                'grapesjs-style-bg',
                'grapesjs-lory-slider',
                'grapesjs-tabs',
                'grapesjs-tooltip',
                'grapesjs-touch',
                'grapesjs-parser-postcss'
                //'gjs-aviary',
                //'gjs-plugin-filestack',
            ],
            pluginsOpts: {
                'grapesjs-tui-image-editor': {
                    config: {
                        includeUI: {
                            initMenu: 'filter',
                        },
                    },
                    icons: {
                        'menu.normalIcon.path': '../icon-d.svg',
                        'menu.activeIcon.path': '../icon-b.svg',
                        'menu.disabledIcon.path': '../icon-a.svg',
                        'menu.hoverIcon.path': '../icon-c.svg',
                        'submenu.normalIcon.path': '../icon-d.svg',
                        'submenu.activeIcon.path': '../icon-c.svg',
                    },
                }
            },
            styleManager: {
                // ...
                sectors: [
                    // ...
                    {
                        name: 'Extra',
                        buildProps: ['filter', 'opacity'],
                        properties: [ filterInput ],
                    }
                ]
            },
            storageManager: { type: 'simple-storage' },
        });

        const SimpleStorage = {};

        editor.StorageManager.add('simple-storage', {
            /**
             * Load the data
             * @param  {Array} keys Array containing values to load, eg, ['gjs-components', 'gjs-styles', ...]
             * @param  {Function} clb Callback function to call when the load is ended
             * @param  {Function} clbErr Callback function to call in case of errors
             */
            load(keys, clb, clbErr) {
                const result = {};

                keys.forEach(key => {
                    const value = SimpleStorage[key];
                    if (value) {
                        result[key] = value;
                    }
                });

                // Might be called inside some async method
                clb(result);
            },

            /**
             * Store the data
             * @param  {Object} data Data object to store
             * @param  {Function} clb Callback function to call when the load is ended
             * @param  {Function} clbErr Callback function to call in case of errors
             */
            store(data, clb, clbErr) {
                console.log('data', data)
                for (let key in data) {
                    SimpleStorage[key] = data[key];
                }
                // Might be called inside some async method
                clb();
            }
        });
    });
</script>
</body>
</html>
