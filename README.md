# Hiring test

## Scenario

We want to create a recipe site.
For this, we need a database that contains all the recipes, and that must be accessible via an API.

From this repository, you will have to create the API we need.

## The data model

The recipes are simple and are composed as follows:

- A title;
- A description;
- A complexity from 1 to 4;
- A cost from 1 to 4;
- A duration of realization;
- A list of ingredients;
    - They can be reused between recipes;
    - Each ingredient must contains:
        - A name;
        - A unit (gr, kg, teaspoon, etc...).
- For each ingredient, a quantity;
- A list of realization steps;
- (Optional) An image.


## The API

The API must allow to:
- Create / edit / delete / retrieve recipe data;
- List recipes for a given ingredient;
- Get the list of ingredients with the number of recipe per ingredient 

No need for a contribution GUI, everything must be done from the API.

## Deliver

To validate this test, you must provide us :
- The API you have developed;
- Default contents;
- A documentation of use of the API (An OpenApi documentation can be used as documentation).

**Everything must be committed to a branch of this repository.**

### Optional

- Let us know how much time (in all honesty) you spent on this test
- Feed the API with real recipes, we are out of inspiration for our dinners 😅

## Tools

This project is based on lando of which here are various useful links:
- [Getting started with Lando](https://docs.lando.dev/getting-started/)
- [Lando installation](https://docs.lando.dev/getting-started/installation.html)
- [Lando Symfony recipe](https://docs.lando.dev/symfony/getting-started.html)