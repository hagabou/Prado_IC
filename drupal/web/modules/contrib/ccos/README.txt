CONTENTS OF THIS FILE
---------------------

 * Introduction
   * Drush commands available
 * Requirements
 * Installation
 * Configuration
 * Maintainers


INTRODUCTION
------------

This module will help you to clear cache of sole/specific entity type
(i.e block, node, views block, view page etc.) from contextual links,
local task menu and operations drop-button.

Note: After installing the module, if you can't see the 'Clear cache' menu in
      contextual links, then follow the below instructions:
      * Open inspector of the browser (Right click >> Inspect) or (F12).
      * Click on 'Console' tab next to 'Elements'.
      * Copy 'window.sessionStorage.clear();' and paste, after that hit 'Enter'.
      * Refresh the page you'll find the 'Clear cache' menu in contextual links.

 DRUSH COMMANDS AVAILABLE
 ------------------------

   * drush ccos:etl:
     This will give you the list of all the entity type available in the system.

   * drush ccos [entity_type_id] [id]:
     Example: `drush ccos node 20`: This command will clear cache of the nid- 20
     of node entity type.

 * For a full description of the module, visit the project page:
   https://www.drupal.org/project/ccos

 * To submit bug reports and feature suggestions, or track changes:
   https://www.drupal.org/project/issues/ccos


REQUIREMENTS
------------

No special requirements.


INSTALLATION
------------

 * Install as you would normally install a contributed Drupal module.
   See: https://www.drupal.org/node/895232 for further information.


CONFIGURATION
-------------

 * Configure the user permissions in Administration » People » Permissions:

   - ccos single (Clear Specific Cache)

     The top-level administration categories require this permission to be
     accessible. The 'Clear Cache' menu will be invisible from operations
     section unless this permission is granted.


MAINTAINERS
-----------

Current maintainers:
 * Ravi Kumar Singh (rksyravi) - https://www.drupal.org/u/rksyravi
