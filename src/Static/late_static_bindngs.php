<?php

abstract class DomainObject {
    public static function create() {
        return new static();
    }
}

class User extends DomainObject {}

class Document extends DomainObject {}

print_r(Document::create());
print_r(User::create());
