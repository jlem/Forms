<?php

Form::macro('blank', function($Form)
{
    return sprintf(
        '%s
        %s <a href="%s" class="btn btn-default btn-lg">On second thought...</a>
        %s',
        Form::open(array('url' => $Form->url, 'method' => 'post', 'class' => 'form-horizontal')),
        Form::submit($Form->cta, array('class' => 'btn btn-primary btn-lg')),
        URL::previous(),
        Form::close()
    );   
});

Form::macro('post', function($Form, $errors)
{
    $fields = '';

    foreach ($Form->getFields() as $field) {
        $fields .= $field->render($errors);
    }

    return sprintf(
        '%s
        %s
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                %s
            </div>
        </div>
        %s',
        Form::open(array('url' => $Form->url, 'method' => 'post', 'class' => 'form-horizontal')),
        $fields,
        Form::submit($Form->cta, array('class' => 'btn btn-primary btn-lg')),
        Form::close()
    );   
});

Form::macro('postModel', function($Form, $errors, $Model)
{
    $formOpen = Form::model($Model, array('url' => $Form->url, 'method' => 'post', 'class' => 'form-horizontal'));
    $fields = '';

    foreach ($Form->getFields() as $field) {
        $fields .= $field->render($errors);
    }

    return sprintf(
        '%s
        %s
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                %s
            </div>
        </div>
        %s',
        $formOpen,
        $fields,
        Form::submit($Form->cta, array('class' => 'btn btn-primary btn-lg')),
        Form::close()
    );
});

Form::macro('bootWrapped', function($Field, $callback)
{
    return sprintf(
        '<div class="form-group %s">
            %s
            <div class="col-sm-5">
                %s
            </div>
            <div class="col-sm-4 text-danger form-error-msg">
                %s
            </div>
        </div>',
        $Field->hasErrors() ? 'has-error' : '',
        Form::label($Field->getName(), $Field->getLabel(), array('class' => 'col-sm-3 control-label')),
        $callback($Field),
        $Field->error
    );
});

Form::macro('bootBox', function($Field) {
    $label = Form::label($Field->getName(), $Field->getLabel());
    return sprintf(
        '<div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                <div class="checkbox">
                    %s
                </div>
            </div>
        </div>',
        Form::checkbox($Field->getName(), true, $Field->checked) . ' ' . $label
    );
});

Form::macro('bootRadio', function($Field) {
    $label = Form::label($Field->getName(), $Field->getLabel());
    return sprintf(
        '<div class="form-group">
            <div class="col-sm-offset-3 col-sm-5">
                <div class="radio">
                    %s
                </div>
            </div>
        </div>',
        Form::radio($Field->getName(), true, $Field->checked) . ' ' . $label
    );
});

Form::macro('bootText', function($Field) {
    return Form::bootWrapped($Field, function($Field) {
        return Form::text($Field->getName(), $Field->getValue(), array('class' => 'form-control input-lg', 'maxlength' => $Field->get('maxlength')));
    });
});

Form::macro('bootHidden', function($Field) {
    return Form::hidden($Field->getName(), $Field->getValue(), array('class' => 'form-control input-lg', 'maxlength' => $Field->get('maxlength')));
});

Form::macro('bootTextArea', function($Field) {
    return Form::bootWrapped($Field, function($Field) {
        return Form::textarea($Field->getName(), $Field->getValue(), array('class' => 'form-control input-lg'));
    });
});

Form::macro('bootPassword', function($Field) {
    return Form::bootWrapped($Field, function($Field) {
        return Form::password($Field->getName(), array('class' => 'form-control input-lg'));
    });
});

Form::macro('bootSelect', function($Field) {
    return Form::bootWrapped($Field, function($Field) {
        return Form::select($Field->getName(), $Field->getData(), $Field->getValue(), array('class' => 'form-control input-lg'));
    });
});

Form::macro('bootMultiSelect', function($Field) {
    return Form::bootWrapped($Field, function($Field) {
        return Form::select($Field->getName(), $Field->getData(), $Field->getValue(), array('class' => 'form-control input-lg', 'multiple' => true));
    });
});
