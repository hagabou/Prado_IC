<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/d8base/templates/layout/page.html.twig */
class __TwigTemplate_dc943d7f7b25d87e24c5470a98b76921ca671062b43e73669ce96705685dffc9 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 67];
        $filters = ["escape" => 68];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 62
        echo "
<!-- Start: Header -->
<header role=\"banner\" class=\"header\" id=\"main-header\">
    <div class=\"pure-g\">
        <div class=\"pure-u-1 pure-u-md-6-24\">
            ";
        // line 67
        if ($this->getAttribute(($context["page"] ?? null), "header", [])) {
            // line 68
            echo "                ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "header", [])), "html", null, true);
            echo "
            ";
        }
        // line 70
        echo "            <button type=\"button\" id=\"toggle\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#main-navigation\">
                <i class=\"fas fa-bars\"></i>
            </button>
        </div>

        ";
        // line 75
        if (($this->getAttribute(($context["page"] ?? null), "primary_menu", []) || $this->getAttribute(($context["page"] ?? null), "search", []))) {
            // line 76
            echo "            <div class=\"pure-u-1 pure-u-md-18-24 justify-content-end\">
                ";
            // line 77
            if ($this->getAttribute(($context["page"] ?? null), "search", [])) {
                // line 78
                echo "                    ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "search", [])), "html", null, true);
                echo "
                ";
            }
            // line 80
            echo "                ";
            if ($this->getAttribute(($context["page"] ?? null), "primary_menu", [])) {
                // line 81
                echo "                    ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "primary_menu", [])), "html", null, true);
                echo "
                ";
            }
            // line 83
            echo "            </div>
        ";
        }
        // line 85
        echo "
    </div><!--pure-g-->
</header>
<!-- End: Region -->

<!-- Start: ESPACE PRO -->
";
        // line 91
        if (($this->getAttribute(($context["page"] ?? null), "espace_pro_logo", []) || ($context["espace_pro_connexion"] ?? null))) {
            // line 92
            echo "    <div class=\"espace_pro\" id=\"espace_pro\">
        <div class=\"container\">
            <div class=\"pure-g clearfix\">
                ";
            // line 95
            if ($this->getAttribute(($context["page"] ?? null), "espace_pro_logo", [])) {
                // line 96
                echo "                    <div class=\"espace_pro_logo pure-u-24-24 pure-u-sm-24-24\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "espace_pro_logo", [])), "html", null, true);
                echo "</div>
                ";
            }
            // line 98
            echo "                ";
            if ($this->getAttribute(($context["page"] ?? null), "espace_pro_connexion", [])) {
                // line 99
                echo "                    <div class=\"espace_pro_connexion  pure-u-24-24 pure-u-sm-4-24\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "espace_pro_connexion", [])), "html", null, true);
                echo "</div>
                ";
            }
            // line 101
            echo "            </div>
        </div>
    </div>
";
        }
        // line 105
        echo "<!-- End: Region -->

<!-- Start: Top widget -->
";
        // line 108
        if ((($this->getAttribute(($context["page"] ?? null), "topwidget_first", []) || $this->getAttribute(($context["page"] ?? null), "topwidget_second", [])) || $this->getAttribute(($context["page"] ?? null), "topwidget_third", []))) {
            // line 109
            echo "
    <div class=\"topwidget\" id=\"topwidget\">
        <div class=\"container\">
            ";
            // line 112
            if ($this->getAttribute(($context["page"] ?? null), "topwidget_title", [])) {
                // line 113
                echo "                <div class=\"custom-block-title\" >
                    ";
                // line 114
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "topwidget_title", [])), "html", null, true);
                echo "
                </div>
            ";
            }
            // line 117
            echo "
            <div class=\"row topwidget-list clearfix\">
                ";
            // line 119
            if ($this->getAttribute(($context["page"] ?? null), "topwidget_first", [])) {
                // line 120
                echo "                    <div class = ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["topwidget_class"] ?? null)), "html", null, true);
                echo ">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "topwidget_first", [])), "html", null, true);
                echo "</div>
                ";
            }
            // line 122
            echo "                ";
            if ($this->getAttribute(($context["page"] ?? null), "topwidget_second", [])) {
                // line 123
                echo "                    <div class = ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["topwidget_class"] ?? null)), "html", null, true);
                echo ">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "topwidget_second", [])), "html", null, true);
                echo "</div>
                ";
            }
            // line 125
            echo "                ";
            if ($this->getAttribute(($context["page"] ?? null), "topwidget_third", [])) {
                // line 126
                echo "                    <div class = ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["topwidget_class"] ?? null)), "html", null, true);
                echo ">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "topwidget_third", [])), "html", null, true);
                echo "</div>
                ";
            }
            // line 128
            echo "            </div>
        </div>
    </div>

";
        }
        // line 133
        echo "<!-- End: Region -->

<!--Start: Highlighted -->
";
        // line 136
        if ($this->getAttribute(($context["page"] ?? null), "highlighted", [])) {
            // line 137
            echo "    <div class=\"highlighted\">
        <div class=\"container\">
            ";
            // line 139
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "highlighted", [])), "html", null, true);
            echo "
        </div>
    </div>
";
        }
        // line 143
        echo "<!--End: Highlighted -->

<!--Start: Title -->
";
        // line 146
        if (($this->getAttribute(($context["page"] ?? null), "page_title", []) &&  !($context["is_front"] ?? null))) {
            // line 147
            echo "    <div id=\"page-title\">
        <div id=\"page-title-inner\">
            ";
            // line 149
            if ( !($context["is_front"] ?? null)) {
                // line 150
                echo "                <div class=\"pure-g\">
                    <div class=\"pure-u pure-u-24-24\">";
                // line 151
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "breadcrumb", [])), "html", null, true);
                echo "</div>
                </div>
            ";
            }
            // line 154
            echo "            ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "page_title", [])), "html", null, true);
            echo "
        </div>
    </div>
";
        }
        // line 158
        echo "<!--End: Title -->

<!--Start: Breadcrumb -->
";
        // line 161
        if (($this->getAttribute(($context["page"] ?? null), "breadcrumb", []) &&  !($context["is_front"] ?? null))) {
            // line 162
            echo "    <div id=\"breadcrumb\">
        <div class=\"pure-g\">
            <div class=\"pure-u-24-24\">";
            // line 164
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "breadcrumb", [])), "html", null, true);
            echo "</div>
        </div>
    </div>
";
        }
        // line 168
        echo "<!--End: Title -->

<!--Start: main-content -->
<main role=\"main\" class=\"main-content\">
    <div class=\"wrap-content\">
        <div class=\"pure-g layout\">
            ";
        // line 174
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])) {
            // line 175
            echo "                <div class=\"pure-u-1 ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebarfirst"] ?? null)), "html", null, true);
            echo "\">
                    <div class=\"sidebar\">
                        ";
            // line 177
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])), "html", null, true);
            echo "
                    </div>
                </div>
            ";
        }
        // line 181
        echo "
            ";
        // line 182
        if ($this->getAttribute(($context["page"] ?? null), "content", [])) {
            // line 183
            echo "                <div class=\"pure-u-1 ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["contentlayout"] ?? null)), "html", null, true);
            echo "\">
                    <div class=\"content_layout\">
                        ";
            // line 185
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true);
            echo "
                    </div>              
                </div>
            ";
        }
        // line 189
        echo "
            ";
        // line 190
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])) {
            // line 191
            echo "                <div class=\"pure-u-1 ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebarsecond"] ?? null)), "html", null, true);
            echo "\">
                    <div class=\"sidebar\">
                        ";
            // line 193
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])), "html", null, true);
            echo "
                    </div>
                </div>
            ";
        }
        // line 197
        echo "
        </div>
    </div>
</main>
<!-- End: main-content -->

<!-- Start: Footer widgets -->
";
        // line 204
        if ((($this->getAttribute(($context["page"] ?? null), "footer_first", []) || $this->getAttribute(($context["page"] ?? null), "footer_second", [])) || $this->getAttribute(($context["page"] ?? null), "footer_third", []))) {
            // line 205
            echo "
<footer role=\"contentinfo\" class=\"footer\" id=\"footer\">
        ";
            // line 207
            if ($this->getAttribute(($context["page"] ?? null), "footer_title", [])) {
                // line 208
                echo "            <div class=\"custom-block-title\" >
                ";
                // line 209
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_title", [])), "html", null, true);
                echo "
            </div>
        ";
            }
            // line 212
            echo "
        <div class=\"pure-g ";
            // line 213
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_align"] ?? null)), "html", null, true);
            echo "\">
            ";
            // line 214
            if ($this->getAttribute(($context["page"] ?? null), "footer_first", [])) {
                // line 217
                echo "                <div class =\"pure-u-1 pure-u-md-2-24\">
                    ";
                // line 218
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_first", [])), "html", null, true);
                echo "
                </div>
            ";
            }
            // line 221
            echo "            ";
            if ($this->getAttribute(($context["page"] ?? null), "footer_second", [])) {
                // line 222
                echo "                <div class =\"pure-u-1 pure-u-md-16-24\">
                    ";
                // line 223
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_second", [])), "html", null, true);
                echo "
                </div>
            ";
            }
            // line 226
            echo "            ";
            if ($this->getAttribute(($context["page"] ?? null), "footer_third", [])) {
                // line 227
                echo "                <div class =\"pure-u-1 pure-u-md-6-24\">
                    ";
                // line 228
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_third", [])), "html", null, true);
                echo "
                </div>
            ";
            }
            // line 231
            echo "        </div>
</footer>
";
        }
        // line 234
        echo "<!-- End: Region -->





";
    }

    public function getTemplateName()
    {
        return "themes/custom/d8base/templates/layout/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  405 => 234,  400 => 231,  394 => 228,  391 => 227,  388 => 226,  382 => 223,  379 => 222,  376 => 221,  370 => 218,  367 => 217,  365 => 214,  361 => 213,  358 => 212,  352 => 209,  349 => 208,  347 => 207,  343 => 205,  341 => 204,  332 => 197,  325 => 193,  319 => 191,  317 => 190,  314 => 189,  307 => 185,  301 => 183,  299 => 182,  296 => 181,  289 => 177,  283 => 175,  281 => 174,  273 => 168,  266 => 164,  262 => 162,  260 => 161,  255 => 158,  247 => 154,  241 => 151,  238 => 150,  236 => 149,  232 => 147,  230 => 146,  225 => 143,  218 => 139,  214 => 137,  212 => 136,  207 => 133,  200 => 128,  192 => 126,  189 => 125,  181 => 123,  178 => 122,  170 => 120,  168 => 119,  164 => 117,  158 => 114,  155 => 113,  153 => 112,  148 => 109,  146 => 108,  141 => 105,  135 => 101,  129 => 99,  126 => 98,  120 => 96,  118 => 95,  113 => 92,  111 => 91,  103 => 85,  99 => 83,  93 => 81,  90 => 80,  84 => 78,  82 => 77,  79 => 76,  77 => 75,  70 => 70,  64 => 68,  62 => 67,  55 => 62,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/d8base/templates/layout/page.html.twig", "/home/clients/e5563ad64381a5082e6e204d852740fa/sites/salon-prado.tadaa.dev/drupal8/web/themes/custom/d8base/templates/layout/page.html.twig");
    }
}
