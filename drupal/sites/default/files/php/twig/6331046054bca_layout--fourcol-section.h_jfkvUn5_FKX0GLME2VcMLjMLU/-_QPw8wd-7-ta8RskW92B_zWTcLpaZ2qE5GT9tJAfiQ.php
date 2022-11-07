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

/* core/themes/stable/layouts/fourcol_section/layout--fourcol-section.html.twig */
class __TwigTemplate_feb1f5e4666ec7217f90318f2c227f3fca00e4988f9dbc2bf9c50699c62ab7fe extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 12, "if" => 17];
        $filters = ["escape" => 18];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
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
        // line 12
        $context["classes"] = [0 => "layout", 1 => "layout--fourcol-section"];
        // line 17
        if (($context["content"] ?? null)) {
            // line 18
            echo "  <div";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
            echo ">

    ";
            // line 20
            if ($this->getAttribute(($context["content"] ?? null), "first", [])) {
                // line 21
                echo "      <div ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["region_attributes"] ?? null), "first", []), "addClass", [0 => "layout__region", 1 => "layout__region--first"], "method")), "html", null, true);
                echo ">
        ";
                // line 22
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "first", [])), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 25
            echo "
    ";
            // line 26
            if ($this->getAttribute(($context["content"] ?? null), "second", [])) {
                // line 27
                echo "      <div ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["region_attributes"] ?? null), "second", []), "addClass", [0 => "layout__region", 1 => "layout__region--second"], "method")), "html", null, true);
                echo ">
        ";
                // line 28
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "second", [])), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 31
            echo "
    ";
            // line 32
            if ($this->getAttribute(($context["content"] ?? null), "third", [])) {
                // line 33
                echo "      <div ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["region_attributes"] ?? null), "third", []), "addClass", [0 => "layout__region", 1 => "layout__region--third"], "method")), "html", null, true);
                echo ">
        ";
                // line 34
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "third", [])), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 37
            echo "
    ";
            // line 38
            if ($this->getAttribute(($context["content"] ?? null), "fourth", [])) {
                // line 39
                echo "      <div ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["region_attributes"] ?? null), "fourth", []), "addClass", [0 => "layout__region", 1 => "layout__region--fourth"], "method")), "html", null, true);
                echo ">
        ";
                // line 40
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["content"] ?? null), "fourth", [])), "html", null, true);
                echo "
      </div>
    ";
            }
            // line 43
            echo "
  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "core/themes/stable/layouts/fourcol_section/layout--fourcol-section.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 43,  120 => 40,  115 => 39,  113 => 38,  110 => 37,  104 => 34,  99 => 33,  97 => 32,  94 => 31,  88 => 28,  83 => 27,  81 => 26,  78 => 25,  72 => 22,  67 => 21,  65 => 20,  59 => 18,  57 => 17,  55 => 12,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "core/themes/stable/layouts/fourcol_section/layout--fourcol-section.html.twig", "/home/clients/e5563ad64381a5082e6e204d852740fa/sites/salon-prado.tadaa.dev/drupal8/web/core/themes/stable/layouts/fourcol_section/layout--fourcol-section.html.twig");
    }
}
