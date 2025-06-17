# First Note

## Section 1 (Perparing Actions)

by default actions are working but if it dosn't work we can still make it work

> form _settings_ -> _Actions_ -> _General_ -> _Allow all actions and reusable workflows_

### workflows

all workflows are located in `.github/workflows` directory and it's extension is `.yml` or `.yaml`

### yaml file syntax

key and value separted by a column `:`

value can be as another key-value pair too but we have to use indentation

to add list as a value it has to start with `-`

```yml
    name: Mohamed Saad Gheit

    family: 
        father: Ahmed
        mother: Sara
        children:
            son: 
                - Yousef
                - Nader
            daughter: Nada

```
