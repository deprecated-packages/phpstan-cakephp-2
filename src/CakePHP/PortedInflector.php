<?php

declare(strict_types=1);

namespace PHPStanCakePHP2\CakePHP;

/**
 * @link https://book.cakephp.org/2.0/en/core-utility-libraries/inflector.html
 */
final class PortedInflector
{
    /**
     * Plural inflector rules
     *
     * @var array<string, mixed[]>
     */
    private static $_plural = [
        'rules' => [
            '/(s)tatus$/i' => '\1tatuses',
            '/(quiz)$/i' => '\1zes',
            '/^(ox)$/i' => '\1\2en',
            '/([m|l])ouse$/i' => '\1ice',
            '/(matr|vert|ind)(ix|ex)$/i' => '\1ices',
            '/(x|ch|ss|sh)$/i' => '\1es',
            '/([^aeiouy]|qu)y$/i' => '\1ies',
            '/(hive)$/i' => '\1s',
            '/(?:([^f])fe|([lre])f)$/i' => '\1\2ves',
            '/sis$/i' => 'ses',
            '/([ti])um$/i' => '\1a',
            '/(p)erson$/i' => '\1eople',
            '/(?<!u)(m)an$/i' => '\1en',
            '/(c)hild$/i' => '\1hildren',
            '/(buffal|tomat)o$/i' => '\1\2oes',
            '/(alumn|bacill|cact|foc|fung|nucle|radi|stimul|syllab|termin)us$/i' => '\1i',
            '/us$/i' => 'uses',
            '/(alias)$/i' => '\1es',
            '/(ax|cris|test)is$/i' => '\1es',
            '/s$/' => 's',
            '/^$/' => '',
            '/$/' => 's',
        ],
        'uninflected' => [
            '.*[nrlm]ese',
            '.*data',
            '.*deer',
            '.*fish',
            '.*measles',
            '.*ois',
            '.*pox',
            '.*sheep',
            'people',
            'feedback',
            'stadia',
        ],
        'irregular' => [
            'atlas' => 'atlases',
            'beef' => 'beefs',
            'brief' => 'briefs',
            'brother' => 'brothers',
            'cafe' => 'cafes',
            'child' => 'children',
            'cookie' => 'cookies',
            'corpus' => 'corpuses',
            'cow' => 'cows',
            'criterion' => 'criteria',
            'ganglion' => 'ganglions',
            'genie' => 'genies',
            'genus' => 'genera',
            'graffito' => 'graffiti',
            'hoof' => 'hoofs',
            'loaf' => 'loaves',
            'man' => 'men',
            'money' => 'monies',
            'mongoose' => 'mongooses',
            'move' => 'moves',
            'mythos' => 'mythoi',
            'niche' => 'niches',
            'numen' => 'numina',
            'occiput' => 'occiputs',
            'octopus' => 'octopuses',
            'opus' => 'opuses',
            'ox' => 'oxen',
            'penis' => 'penises',
            'person' => 'people',
            'sex' => 'sexes',
            'soliloquy' => 'soliloquies',
            'testis' => 'testes',
            'trilby' => 'trilbys',
            'turf' => 'turfs',
            'potato' => 'potatoes',
            'hero' => 'heroes',
            'tooth' => 'teeth',
            'goose' => 'geese',
            'foot' => 'feet',
            'sieve' => 'sieves',
        ],
    ];

    /**
     * Words that should not be inflected
     *
     * @var array
     */
    private static $_uninflected = [
        'Amoyese',
        'bison',
        'Borghese',
        'bream',
        'breeches',
        'britches',
        'buffalo',
        'cantus',
        'carp',
        'chassis',
        'clippers',
        'cod',
        'coitus',
        'Congoese',
        'contretemps',
        'corps',
        'debris',
        'diabetes',
        'djinn',
        'eland',
        'elk',
        'equipment',
        'Faroese',
        'flounder',
        'Foochowese',
        'gallows',
        'Genevese',
        'Genoese',
        'Gilbertese',
        'graffiti',
        'headquarters',
        'herpes',
        'hijinks',
        'Hottentotese',
        'information',
        'innings',
        'jackanapes',
        'Kiplingese',
        'Kongoese',
        'Lucchese',
        'mackerel',
        'Maltese',
        '.*?media',
        'mews',
        'moose',
        'mumps',
        'Nankingese',
        'news',
        'nexus',
        'Niasese',
        'Pekingese',
        'Piedmontese',
        'pincers',
        'Pistoiese',
        'pliers',
        'Portuguese',
        'proceedings',
        'rabies',
        'research',
        'rice',
        'rhinoceros',
        'salmon',
        'Sarawakese',
        'scissors',
        'sea[- ]bass',
        'series',
        'Shavese',
        'shears',
        'siemens',
        'species',
        'swine',
        'testes',
        'trousers',
        'trout',
        'tuna',
        'Vermontese',
        'Wenchowese',
        'whiting',
        'wildebeest',
        'Yengeese',
    ];

    /**
     * Method cache array.
     *
     * @var array
     */
    private static $_cache = [];

    /**
     * Returns corresponding table name for given model $className. ("people" for the model class "Person").
     *
     * @param string $className Name of class to get database table name for
     * @return string Name of the database table for given class
     * @link https://book.cakephp.org/2.0/en/core-utility-libraries/inflector.html#Inflector::tableize
     */
    public static function tableize($className)
    {
        return self::pluralize(self::underscore($className));
    }

    /**
     * Return $word in plural form.
     *
     * @param string $word Word in singular
     * @return string Word in plural
     * @link https://book.cakephp.org/2.0/en/core-utility-libraries/inflector.html#Inflector::pluralize
     */
    public static function pluralize($word)
    {
        if (isset(static::$_cache['pluralize'][$word])) {
            return static::$_cache['pluralize'][$word];
        }

        if (! isset(static::$_plural['merged']['irregular'])) {
            static::$_plural['merged']['irregular'] = static::$_plural['irregular'];
        }

        if (! isset(static::$_plural['merged']['uninflected'])) {
            static::$_plural['merged']['uninflected'] = array_merge(
                static::$_plural['uninflected'],
                static::$_uninflected
            );
        }

        if (! isset(static::$_plural['cacheUninflected']) || ! isset(static::$_plural['cacheIrregular'])) {
            static::$_plural['cacheUninflected'] = '(?:' . implode(
                '|',
                static::$_plural['merged']['uninflected']
            ) . ')';
            static::$_plural['cacheIrregular'] = '(?:' . implode(
                '|',
                array_keys(static::$_plural['merged']['irregular'])
            ) . ')';
        }

        if (preg_match('/(.*?(?:\\b|_))(' . static::$_plural['cacheIrregular'] . ')$/i', $word, $regs)) {
            static::$_cache['pluralize'][$word] = $regs[1] .
                substr($regs[2], 0, 1) .
                substr(static::$_plural['merged']['irregular'][strtolower($regs[2])], 1);
            return static::$_cache['pluralize'][$word];
        }

        if (preg_match('/^(' . static::$_plural['cacheUninflected'] . ')$/i', $word, $regs)) {
            static::$_cache['pluralize'][$word] = $word;
            return $word;
        }

        $word = (string) $word;
        foreach (static::$_plural['rules'] as $rule => $replacement) {
            if (preg_match($rule, $word)) {
                static::$_cache['pluralize'][$word] = preg_replace($rule, $replacement, $word);
                return static::$_cache['pluralize'][$word];
            }
        }

        // fallback
        return $word;
    }

    /**
     * Returns the given camelCasedWord as an underscored_word.
     *
     * @param string $camelCasedWord Camel-cased word to be "underscorized"
     * @return string Underscore-syntaxed version of the $camelCasedWord
     * @link https://book.cakephp.org/2.0/en/core-utility-libraries/inflector.html#Inflector::underscore
     */
    private static function underscore($camelCasedWord)
    {
        $underscoredWord = preg_replace('/(?<=\\w)([A-Z])/', '_\\1', (string) $camelCasedWord);
        return mb_strtolower($underscoredWord);
    }
}
