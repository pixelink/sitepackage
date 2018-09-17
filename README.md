

# What's it about
The sitepackage lets you rapidly setup a templated TYPO3 page.
Most configurations are done, you still have to include a couple of things to make it up and running.

# Included

- Basic configuration
- Gridelements (50-50, 33-33-33, 33-66, 66-33)

# How to use

- best - install via composer
- activate extensions sitepackage (dependencies are installed)
- include static typoscript on root page
- insert some pages in pagetree
- add your own css files in TypoScript/AdditionalTs/page.typoscript - look for "includeCSS" function
- add your own js files  in TypoScript/AdditionalTs/page.typoscript - look for "includeJSFooter" function
- add your HTML Template and organize it in Layout/Partial/Templates within Resources/Private/Layouts, Resources/Private/Partials and Resources/Private/Templates

**@todo more sophisticated manual**
