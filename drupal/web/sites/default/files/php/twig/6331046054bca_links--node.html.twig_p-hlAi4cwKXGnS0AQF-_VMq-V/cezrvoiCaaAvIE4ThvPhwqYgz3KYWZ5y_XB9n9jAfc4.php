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

/* themes/contrib/freelancer_zymphonies_theme/templates/content/links--node.html.twig */
class __TwigTemplate_7cf8de4f0ff7514a61496dce90fbc5e3597ce0ab3ad5ebfe0647053d53a85cd3 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 37, "include" => 39];
        $filters = [];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'include'],
                [],
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
        // line 37
        if (($context["links"] ?? null)) {
            // line 38
            echo "  <div class=\"node__links\">
    ";
            // line 39
            $this->loadTemplate("links.html.twig", "themes/contrib/freelancer_zymphonies_theme/templates/content/links--node.html.twig", 39)->display($context);
            // line 40
            echo "  </div>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/contrib/freelancer_zymphonies_theme/templates/content/links--node.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  62 => 40,  60 => 39,  57 => 38,  55 => 37,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/freelancer_zymphonies_theme/templates/content/links--node.html.twig", "/home/clients/e5563ad64381a5082e6e204d852740fa/sites/salon-prado.tadaa.dev/drupal8/web/themes/contrib/freelancer_zymphonies_theme/templates/content/links--node.html.twig");
    }
}
