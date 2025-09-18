<?php

namespace App\Services;

class SinhalaConverter
{
    /**
     * English to Sinhala character mapping
     */
    protected $charMap = [
        'a' => 'අ',
        'aa' => 'ආ',
        'ae' => 'ඇ',
        'aae' => 'ඈ',
        'i' => 'ඉ',
        'ii' => 'ඊ',
        'u' => 'උ',
        'uu' => 'ඌ',
        'e' => 'එ',
        'ee' => 'ඒ',
        'ai' => 'ඓ',
        'o' => 'ඔ',
        'oo' => 'ඕ',
        'au' => 'ඖ',
        'k' => 'ක්',
        'ka' => 'ක',
        'kaa' => 'කා',
        'kae' => 'කැ',
        'kaae' => 'කෑ',
        'ki' => 'කි',
        'kii' => 'කී',
        'ku' => 'කු',
        'kuu' => 'කූ',
        'ke' => 'කෙ',
        'kee' => 'කේ',
        'kai' => 'කෛ',
        'ko' => 'කො',
        'koo' => 'කෝ',
        'kau' => 'කෞ',
        'g' => 'ග්',
        'ga' => 'ග',
        'gaa' => 'ගා',
        // Add more character mappings for all Sinhala characters
        // This is a simplified version, you should add all character mappings
        'm' => 'ම්',
        'Mudiyanase' => 'මුදියන්සේ',

        'ma' => 'ම',
        'maa' => 'මා',
        'mi' => 'මි',
        'mii' => 'මී',
        'mu' => 'මු',
        'Mu' => 'මු',
        'muu' => 'මූ',
        'me' => 'මෙ',
        'mee' => 'මේ',
        'mai' => 'මෛ',
        'mo' => 'මො',
        'moo' => 'මෝ',
        'mau' => 'මෞ',
        's' => 'ස්',
        'sa' => 'ස',
        'saa' => 'සා',
        'si' => 'සි',
        'sii' => 'සී',
        'su' => 'සු',
        'suu' => 'සූ',
        'se' => 'සෙ',
        'see' => 'සේ',
        'sai' => 'සෛ',
        'so' => 'සො',
        'soo' => 'සෝ',
        'sau' => 'සෞ',
        'th' => 'ත්',
        'tha' => 'ත',
        'thaa' => 'තා',
        'thi' => 'ති',
        'thii' => 'තී',
        'thu' => 'තු',
        'thuu' => 'තූ',
        'the' => 'තෙ',
        'thee' => 'තේ',
        'thai' => 'තෛ',
        'tho' => 'තො',
        'thoo' => 'තෝ',
        'thau' => 'තෞ',
        'd' => 'ද්',
        'da' => 'ද',
        'daa' => 'දා',
        'di' => 'දි',
        'dii' => 'දී',
        'du' => 'දු',
        'duu' => 'දූ',
        'de' => 'දෙ',
        'dee' => 'දේ',
        'dai' => 'දෛ',
        'do' => 'දො',
        'doo' => 'දෝ',
        'dau' => 'දෞ',
        'n' => 'න්',
        'na' => 'න',
        'naa' => 'නා',
        'ni' => 'නි',
        'nii' => 'නී',
        'nu' => 'නු',
        'nuu' => 'නූ',
        'ne' => 'නෙ',
        'nee' => 'නේ',
        'nai' => 'නෛ',
        'no' => 'නො',
        'noo' => 'නෝ',
        'nau' => 'නෞ',
        'l' => 'ල්',
        'la' => 'ල',
        'laa' => 'ලා',
        'li' => 'ලි',
        'lii' => 'ලී',
        'lu' => 'ලු',
        'luu' => 'ලූ',
        'le' => 'ලෙ',
        'lee' => 'ලේ',
        'lai' => 'ලෛ',
        'lo' => 'ලො',
        'loo' => 'ලෝ',
        'lau' => 'ලෞ',
        'h' => 'හ්',
        'ha' => 'හ',
        'haa' => 'හා',
        'hi' => 'හි',
        'hii' => 'හී',
        'hu' => 'හු',
        'huu' => 'හූ',
        'he' => 'හෙ',
        'hee' => 'හේ',
        'hai' => 'හෛ',
        'ho' => 'හො',
        'hoo' => 'හෝ',
        'hau' => 'හෞ',
        'r' => 'ර්',
        'ra' => 'ර',
        'raa' => 'රා',
        'ri' => 'රි',
        'rii' => 'රී',
        'ru' => 'රු',
        'ruu' => 'රූ',
        're' => 'රෙ',
        'ree' => 'රේ',
        'rai' => 'රෛ',
        'ro' => 'රො',
        'roo' => 'රෝ',
        'rau' => 'රෞ',
        'y' => 'ය්',
        'ya' => 'ය',
        'yaa' => 'යා',
        'yi' => 'යි',
        'yii' => 'යී',
        'yu' => 'යු',
        'yuu' => 'යූ',
        'ye' => 'යෙ',
        'yee' => 'යේ',
        'yai' => 'යෛ',
        'yo' => 'යො',
        'yoo' => 'යෝ',
        'yau' => 'යෞ',
        'sh' => 'ෂ්',
        'sha' => 'ෂ',
        'shaa' => 'ෂා',
        'shi' => 'ෂි',
        'shii' => 'ෂී',
        'shu' => 'ෂු',
        'shuu' => 'ෂූ',
        'she' => 'ෂෙ',
        'shee' => 'ෂේ',
        'shai' => 'ෂෛ',
        'sho' => 'ෂො',
        'shoo' => 'ෂෝ',
        'shau' => 'ෂෞ',
    ];

    /**
     * English to Sinhala letter mapping for initials conversion
     */
    protected $initialMap = [
        'a' => 'ඒ',
        'b' => 'බී',
        'c' => 'සී',
        'd' => 'ඩී',
        'e' => 'ඊ',
        'f' => 'එෆ්',
        'g' => 'ජී',
        'h' => 'එච්',
        'i' => 'අයි',
        'j' => 'ජේ',
        'k' => 'කේ',
        'l' => 'එල්',
        'm' => 'එම්',
        'n' => 'එන්',
        'o' => 'ඕ',
        'p' => 'පී',
        'q' => 'කිව්',
        'r' => 'ආර්',
        's' => 'එස්',
        't' => 'ටී',
        'u' => 'යූ',
        'v' => 'වී',
        'w' => 'ඩබ්',
        'x' => 'එක්ස්',
        'y' => 'වයි',
        'z' => 'ඉසෙඩ්'
    ];

    /**
     * Convert English full name to Sinhala
     *
     * @param string $name
     * @return string
     */
    public function englishToSinhala($name)
    {
        // In a real implementation, this would be more complex with proper transliteration rules
        // This is a simplified placeholder

        // Split the name into words
        $words = explode(' ', $name);
        $result = [];

        foreach ($words as $word) {
            // Convert each word using transliteration rules
            // This is where you'd implement complex transliteration logic
            $sinhalaWord = $this->transliterate($word);
            $result[] = $sinhalaWord;
        }

        return implode(' ', $result);
    }

    /**
     * Convert English full name to Sinhala initials and last name
     *
     * @param string $name
     * @return string
     */
    public function englishToSinhalaInitialsLastName($name)
    {
        // Split the name into words
        $words = explode(' ', $name);

        // Get the last name (last word)
        $lastName = array_pop($words);
        $sinhalaLastName = $this->transliterate($lastName);

        // Get initials
        $initials = [];
        foreach ($words as $word) {
            $initial = strtoupper(substr($word, 0, 1)) . '.';
            $sinhalaInitial = $this->initialToSinhala($initial);
            $initials[] = $sinhalaInitial;
        }

        return implode('', $initials) . ' ' . $sinhalaLastName;
    }

    /**
     * Convert English initial to Sinhala initial
     *
     * @param string $initial
     * @return string
     */
    public function initialToSinhala($initial)
    {
        $letter = strtolower(substr($initial, 0, 1));

        if (isset($this->initialMap[$letter])) {
            return $this->initialMap[$letter] . '.';
        }

        return $initial;
    }

    /**
     * Convert English initials and Sinhala last name to proper Sinhala initials and last name
     *
     * @param string $name
     * @return string
     */
    public function englishInitialsToSinhalaInitials($name)
    {
        // Find where the initials end and the Sinhala last name begins
        $parts = explode(' ', $name, 2);

        if (count($parts) != 2) {
            return $name; // Return original if not in expected format
        }

        $englishInitials = $parts[0];
        $sinhalaLastName = $parts[1];

        // Convert each English initial to Sinhala
        $sinhalaInitials = '';
        $initialParts = explode('.', $englishInitials);

        foreach ($initialParts as $initialPart) {
            if (!empty($initialPart)) {
                $sinhalaInitials .= $this->initialToSinhala($initialPart);
            }
        }

        return $sinhalaInitials . ' ' . $sinhalaLastName;
    }

    /**
     * Simple transliteration helper (placeholder - would need to be expanded)
     *
     * @param string $word
     * @return string
     */
    protected function transliterate($word)
    {
        // This is a placeholder for actual transliteration logic
        // In a real implementation, this would handle proper syllable conversion
        // using complex linguistic rules

        // Simple character replacement for demonstration purposes
        $result = $word;

        // Sort keys by length in descending order to handle longer matches first
        $keys = array_keys($this->charMap);
        usort($keys, function($a, $b) {
            return strlen($b) - strlen($a);
        });

        // Perform replacements
        foreach ($keys as $english) {
            $sinhala = $this->charMap[$english];
            $result = str_replace($english, $sinhala, $result);
        }

        return $result;
    }
}
