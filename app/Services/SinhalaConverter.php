<?php

namespace App\Services;

class SinhalaConverter
{
    /**
     * Convert FM/Wijesekara text to Unicode Sinhala
     *
     * @param string $text FM font text to convert
     * @return string Unicode Sinhala text
     */
    public function fmToUnicode(string $text): string
    {
        $mappings = $this->getFmToUnicodeMappings();
        // Sort mappings by length (longest first) to handle complex patterns first
        $keys = array_map('strlen', array_keys($mappings));
        array_multisort($keys, SORT_DESC, $mappings);

        foreach ($mappings as $fm => $unicode) {
            // Escape special characters for regex pattern
            $pattern = '/' . preg_quote($fm, '/') . '/u';
            $text = preg_replace($pattern, $unicode, $text);
        }

        return $text;
    }

    /**
     * Convert Unicode Sinhala to FM/Wijesekara text
     *
     * @param string $text Unicode Sinhala text to convert
     * @return string FM font text
     */
    public function unicodeToFm(string $text): string
    {
        $mappings = $this->getUnicodeToFmMappings();
        // Sort mappings by length (longest first) to handle complex patterns first
        $keys = array_map('strlen', array_keys($mappings));
        array_multisort($keys, SORT_DESC, $mappings);

        foreach ($mappings as $unicode => $fm) {
            $pattern = '/' . preg_quote($unicode, '/') . '/u'; // 'u' flag for Unicode
            $text = preg_replace($pattern, $fm, $text);
        }

        return $text;
    }

    /**
     * Get FM to Unicode mapping array
     *
     * @return array Associative array of FM to Unicode mappings
     */
    private function getFmToUnicodeMappings(): array
    {
        return [
            // ASCII to Unicode mappings
            ',' => 'ල',
            '\.' => 'ග',
            '\(' => '(',
            '\'' => ',',
            '%' => '%',
            '\/' => '$',
            '–' => '‐',
            '\?' => '@',
            '!' => 'æ',
            '\=' => '}',
            '\'' => '~',
            '\+' => '¤',
            '\:' => '•',
            '\÷' => '›',
            '\;' => '∙',

            // Consonants
            'ග' => '.',
            'ළු' => '¿',
            'ෂ' => 'I',
            'ං' => 'x',
            'ඃ' => '#',
            'ඹ' => 'U',
            'ඡ' => 'P',
            'ඪ' => 'V',
            'ඝ' => '>',
            'ඊ' => 'B',
            'ඣ' => 'CO',
            'ඛ' => 'L',
            'ළ' => '<',
            'ඟ' => 'Õ',
            'ණ' => 'K',
            'ඵ' => 'M',
            'ඨ' => 'G',
            'ළ' => '<',
            'ඝ' => '>',
            'රැ' => '/',
            'ථ' => ':',
            'ත' => ';',
            'ඊ' => 'B',
            'ක‍' => 'C',
            '‍ෘ' => 'D',
            'ෑ' => 'E',
            'ත‍' => 'F',
            'ඨ' => 'G',
            '්‍ය' => 'H',
            'ෂ' => 'I',
            'න‍' => 'J',
            'ණ' => 'K',
            'ඛ' => 'L',
            'ඵ' => 'M',
            'භ' => 'N',
            'ධ' => 'O',
            'ඡ' => 'P',
            'ඍ' => 'R',
            'ඔ' => 'T',
            'ඹ' => 'U',
            'ඪ' => 'V',
            'උ' => 'W',
            'ශ' => 'Y',
            'ඤ' => '[',
            'ඉ' => 'b',
            'ජ' => 'c',
            'ට' => 'g',
            'ය' => 'h',
            'ස' => 'i',
            'ව' => 'j',
            'න' => 'k',
            'ක' => 'l',
            'ප' => 'm',
            'බ' => 'n',
            'ද' => 'o',
            'ච' => 'p',
            'ර' => 'r',
            'එ' => 't',
            'ම' => 'u',
            'ඩ' => 'v',
            'අ' => 'w',
            'හ' => 'y',
            'ඥ' => '{',
            'ඳ' => '|',
            'ක්‍ෂ' => 'Ì',

            // Vowel signs and modifiers
            'ැ' => 'e',
            'ෑ' => 'E',
            'ෙ' => 'f',
            'ු' => 'q',
            'ි' => 's',
            'ූ' => 'Q',
            'ී' => 'S',
            'ෘ' => 'D',
            'ෲ' => 'DD',
            'ෟ' => '!',
            'ා' => 'd',
            '්' => 'a',

            // Complex mappings for combined characters
            'yo' => 'යො',
            'ත්‍රෛ' => 'ff;%',
            'ශෛ' => 'ffY',
            'චෛ' => 'ffp',
            'ජෛ' => 'ffc',
            'කෛ' => 'ffl',
            'මෛ' => 'ffu',
            'පෛ' => 'ffm',
            'දෛ' => 'ffo',
            'තෛ' => 'ff;',
            'නෛ' => 'ffk',
            'ධෛ' => 'ffO',
            'වෛ' => 'ffj',
            'ප්‍රෞ' => 'fm%!',
            'ෂ්‍යෝ' => 'fIHda',
            'ඡ්‍යෝ' => 'fPHda',
            'ඪ්‍යෝ' => 'fVHda',
            'ඝ්‍යෝ' => 'f>Hda',
            'ඛ්‍යෝ' => 'fLHda',
            'ළ්‍යෝ' => 'f<Hda',
            'ඵ්‍යෝ' => 'fMHda',
            'ඨ්‍යෝ' => 'fGHda',
            'ශ්‍යෝ' => 'fYHda',
            'ක්‍ෂ්‍යෝ' => 'fÌHda',
            'බ්‍යෝ' => 'fnHda',
            'ච්‍යෝ' => 'fpHda',
            'ඩ්‍යෝ' => 'fâHda',
            'ෆ්‍යෝ' => 'f*Hda',
            'ග්‍යෝ' => 'f.Hda',
            'ජ්‍යෝ' => 'fcHda',
            'ක්‍යෝ' => 'flHda',
            'ල්‍යෝ' => 'f,Hda',
            'ම්‍යෝ' => 'fuHda',
            'න්‍යෝ' => 'fkHda',
            'ප්‍යෝ' => 'fmHda',
            'ද්‍යෝ' => 'foHda',
            'ස්‍යෝ' => 'fiHda',
            'ට්‍යෝ' => 'fgHda',
            'ව්‍යෝ' => 'fjHda',
            'ත්‍යෝ' => 'f;Hda',
            'භ්‍යෝ' => 'fNHda',
            'ධ්‍යෝ' => 'fOHda',
            'ථ්‍යෝ' => 'f:Hda',

            // Special combinations and additional characters
            'ෂෞ' => 'fI!',
            'ඡෞ' => 'fP!',
            'ශෞ' => 'fY!',
            'බෞ' => 'fn!',
            'චෞ' => 'fp!',
            'ඩෞ' => 'fv!',
            'ෆෞ' => 'f*!',
            'ගෞ' => 'f.!',
            'ජෞ' => 'fc!',
            'කෞ' => 'fl!',
            'ලෞ' => 'f,!',
            'මෞ' => 'fu!',
            'නෞ' => 'fk!',
            'පෞ' => 'fm!',
            'දෞ' => 'fo!',
            'රෞ' => 'fr!',
            'සෞ' => 'fi!',
            'ටෞ' => 'fg!',
            'තෞ' => 'f;!',
            'භෞ' => 'fN!',
            'ඤෞ' => 'f[!',

            // Additional mappings from the file
            'ආ' => 'wd',
            'ඇ' => 'we',
            'ඈ' => 'wE',
            'ඌ' => 'W!',
            'ඖ' => 'T!',
            'ඒ' => 'ta,',
            'ඕ' => 'Ta',
        ];
    }

    /**
     * Get Unicode to FM mapping array (reverse of FM to Unicode)
     *
     * @return array Associative array of Unicode to FM mappings
     */
    private function getUnicodeToFmMappings(): array
    {
        // Create reverse mappings from FM to Unicode mappings
        return array_flip($this->getFmToUnicodeMappings());
    }

    /**
     * Detect if text is FM/Wijesekara or Unicode Sinhala
     *
     * @param string $text Text to analyze
     * @return string 'fm' or 'unicode'
     */
    public function detectTextType(string $text): string
    {
        // Count characters that are likely to be FM font vs Unicode
        preg_match_all('/[lkjpoiuytrewqasdfghjmnbvcxz]/i', $text, $fmMatches);
        preg_match_all('/[\x{0D80}-\x{0DFF}]/u', $text, $unicodeMatches);

        $fmCount = count($fmMatches[0] ?? []);
        $unicodeCount = count($unicodeMatches[0] ?? []);

        return ($unicodeCount > $fmCount) ? 'unicode' : 'fm';
    }

    /**
     * English to Sinhala character mapping
     */
    protected $charMap = [
        'A' => 'අ',
        'a' => 'අ',
        'U' => 'උ',
        'u' => 'උ',
        'I' => 'ඉ',
        'i' => 'ඉ',
        'O' => 'ඔ',
        'o' => 'ඔ',
        'E' => 'එ',
        'e' => 'එ',
        'K' => 'ක්',
        'Ka' => 'ක',
        'Ke' => 'කේ',
        'Ki' => 'කි',
        'Ko' => 'කෝ',
        'Ku' => 'කු',
        'G' => 'ග්',
        'Ga' => 'ග',
        'Ge' => 'ගේ',
        'Gi' => 'ගි',
        'Go' => 'ගෝ',
        'Gu' => 'ගු',
        'M' => 'ම්',
        'Ma' => 'ම',
        'Me' => 'මේ',
        'Mi' => 'මි',
        'Mo' => 'මෝ',
        'Mu' => 'මු',
        'N' => 'න්',
        'Na' => 'න',
        'Ne' => 'නේ',
        'Ni' => 'නි',
        'No' => 'නෝ',
        'Nu' => 'නු',
        'P' => 'ප්',
        'Pa' => 'ප',
        'Pe' => 'පේ',
        'Pi' => 'පි',
        'Po' => 'පෝ',
        'Pu' => 'පු',
        'B' => 'බ්',
        'Ba' => 'බ',
        'Be' => 'බේ',
        'Bi' => 'බි',
        'Bo' => 'බෝ',
        'Bu' => 'බු',
        'T' => 'ට්',
        'Ta' => 'ට',
        'Te' => 'ටේ',
        'Ti' => 'ටි',
        'To' => 'ටෝ',
        'Tu' => 'ටු',
        'D' => 'ඩ්',
        'Da' => 'ඩ',
        'De' => 'ඩේ',
        'Di' => 'ඩි',
        'Do' => 'ඩෝ',
        'Du' => 'ඩු',
        'S' => 'ස්',
        'Sa' => 'ස',
        'Se' => 'සේ',
        'Si' => 'සි',
        'So' => 'සෝ',
        'Su' => 'සු',
        'H' => 'හ්',
        'Ha' => 'හ',
        'He' => 'හේ',
        'Hi' => 'හි',
        'Ho' => 'හෝ',
        'Hu' => 'හු',
        'L' => 'ල්',
        'La' => 'ල',
        'Le' => 'ලේ',
        'Li' => 'ලි',
        'Lo' => 'ලෝ',
        'Lu' => 'ලු',
        'R' => 'ර්',
        'Ra' => 'ර',
        'Re' => 'රේ',
        'Ri' => 'රි',
        'Ro' => 'රෝ',
        'Ru' => 'රු',
        'V' => 'ව්',
        'Va' => 'ව',
        'Ve' => 'වේ',
        'Vi' => 'වි',
        'Vo' => 'වෝ',
        'Vu' => 'වු',
        'Y' => 'ය්',
        'Ya' => 'ය',
        'Ye' => 'යේ',
        'Yi' => 'යි',
        'Yo' => 'යෝ',
        'Yu' => 'යු',
        'Th' => 'ත්',
        'th' => 'ත්',
        'Dh' => 'ධ්',
        'dh' => 'ධ්',
        'Ch' => 'ච්',
        'ch' => 'ච්',
        'J' => 'ජ්',
        'Ja' => 'ජ',
        'Je' => 'ජේ',
        'Ji' => 'ජි',
        'Jo' => 'ජෝ',
        'Ju' => 'ජු',
        'Ng' => 'ඞ්',
        'ng' => 'ඞ්',
        'Tt' => 'ට්',
        'tt' => 'ට්',
        'Dd' => 'ඩ්',
        'dd' => 'ඩ්',
        'Nn' => 'න්',
        'nn' => 'න්',

         // Name mappings for common English names to Sinhala
        'John' => 'ජෝන්',
        'Michael' => 'මයිකල්',
        'David' => 'ඩේවිඩ්',
        'James' => 'ජේම්ස්',
        'Robert' => 'රොබට්',
        'Mary' => 'මැරි',
        'Patricia' => 'පැට්‍රිෂියා',
        'Jennifer' => 'ජෙනිෆර්',
        'Linda' => 'ලින්ඩා',
        'Elizabeth' => 'එලිසබෙත්',
        'William' => 'විලියම්',
        'Richard' => 'රිචඩ්',
        'Joseph' => 'ජෝසප්',
        'Thomas' => 'තෝමස්',
        'Charles' => 'චාල්ස්',
        'Christopher' => 'ක්‍රිස්ටෝෆර්',
        'Daniel' => 'ඩැනියල්',
        'Matthew' => 'මැතිව්',
        'Anthony' => 'ඇන්තනි',
        'Mark' => 'මාක්',
        'Donald' => 'ඩොනල්ඩ්',
        'Steven' => 'ස්ටීවන්',
        'Paul' => 'පෝල්',
        'Andrew' => 'ඇන්ඩෘ',
        'Joshua' => 'ජෝෂුවා',
        'Kenneth' => 'කෙනෙත්',
        'Kevin' => 'කෙවින්',
        'Brian' => 'බ්‍රයන්',
        'George' => 'ජෝර්ජ්',
        'Edward' => 'එඩ්වඩ්',
        'Ronald' => 'රොනල්ඩ්',
        'Timothy' => 'ටිමෝති',
        'Jason' => 'ජේසන්',
        'Jeffrey' => 'ජෙෆ්රි',
        'Ryan' => 'රයන්',
        'Jacob' => 'ජේකබ්',
        'Gary' => 'ගැරි',
        'Nicholas' => 'නිකොලස්',
        'Eric' => 'එරික්',
        'Stephen' => 'ස්ටීෆන්',
        'Jonathan' => 'ජොනාතන්',
        'Larry' => 'ලැරි',
        'Justin' => 'ජස්ටින්',
        'Scott' => 'ස්කොට්',
        'Brandon' => 'බ්‍රැන්ඩන්',
        'Benjamin' => 'බෙන්ජමින්',
        'Samuel' => 'සැමුවෙල්',
        'Gregory' => 'ග්‍රෙගරි',
        'Frank' => 'ෆ්‍රෑන්ක්',
        'Alexander' => 'ඇලෙක්සැන්ඩර්',
        'Raymond' => 'රේමන්ඩ්',
        'Patrick' => 'පැට්‍රික්',
        'Jack' => 'ජැක්',
        'Dennis' => 'ඩෙනිස්',
        'Jerry' => 'ජෙරි',
        'Tyler' => 'ටයිලර්',
        'Aaron' => 'ඇරෝන්',
        'Jose' => 'ජෝස්',

        // Sinhala Name mappings for common English names to Sinhala

        'Amarasingha' => 'අමරසිංහ',
        'Perera' => 'පෙරේරා',
        'Silva' => 'සිල්වා',
        'Jayawardena' => 'ජයවර්ධන',
        'Kumarasinghe' => 'කුමාරසිංහ',
        'Wijesinghe' => 'විජේසිංහ',
        'Gunawardena' => 'ගුණවර්ධන',
        'Rajapaksa' => 'රාජපක්ෂ',
        'De Silva' => 'ඩි සිල්වා',
        'Dias' => 'ඩයස්',
        'Abeywardena' => 'අබේවර්ධන',
        'Samarasinghe' => 'සමරසිංහ',
        'Wickramasinghe' => 'වික්‍රමසිංහ',
        'Ekanayake' => 'ඒකනායක',
        'Jayasinghe' => 'ජයසිංහ',
        'Fernando' => 'ෆර්නැන්ඩෝ',
        'Mendis' => 'මෙන්ඩිස්',
        'Liyanage' => 'ලියනගේ',
        'Bandara' => 'බණ්ඩාර',
        'Senanayake' => 'සේනානායක',
        'Hewage' => 'හේවගේ',
        'Rajapakse' => 'රාජපක්ෂ',
        'Fernando' => 'ෆර්නැන්ඩෝ',
        'Mudiyanse' => 'මුදියන්සේ   ',
        'Kodikara' => 'කොඩිකාර',
        'Gamage' => 'ගමගේ',
        'Nissanka' => 'නිස්සංක',
        'Thilakaratne' => 'තිලකරත්න',
        'Wimalasena' => 'විමලසේන',
        'Seneviratne' => 'සෙනෙවිරත්න',
        'Dissanayake' => 'දිසානායක',
        'Hewapathirana' => 'හේවාපතිරණ',
        'Wijeratne' => 'විජේරත්න',
        'Kaluarachchi' => 'කලුආරච්චි',
        'Ratnayake' => 'රත්නායක',
        'Jayakody' => 'ජයකොඩි',
        'Pathirana' => 'පතිරණ',
        'Samarawickrama' => 'සමරවික්‍රම',
        'Wijayapala' => 'විජයපාල',
        'Karunaratne' => 'කරුණාරත්න',
        'Premaratne' => 'ප්‍රේමරත්න',
        'Wijesekara' => 'විජේසේකර',
        'Senaratne' => 'සේනාරත්න',
        'Amarathunga' => 'අමරතුංග',
        'Jayawardhana' => 'ජයවර්ධන',
        'Wijethunga' => 'විජේතුංග',
        'Kumara' => 'කුමාර',
        'Peris' => 'පීරිස්',
        'Dias' => 'ඩයස්',
        'Fonseka' => 'ෆොන්සේකා',
        'De Alwis' => 'ද ඇල්විස්',
        'De Mel' => 'ද මැල්',
        'De Zoysa' => 'ද සොයිසා',
        'De Costa' => 'ද කොස්තා',
        'De Silva' => 'ද සිල්වා',
        'Mohomad' => 'මොහොමඩ්',
        'Hassan' => 'හසන්',
        'Abdul' => 'අබ්දුල්',
        'Aziz' => 'අසීස්',
        'Khan' => 'ඛාන්',
        'Ali' => 'අලි',
        'Hameed' => 'හමීඩ්',
        'Rashid' => 'රෂීඩ්',
        'Farook' => 'ෆරුක්',
        'Saeed' => 'සාඊඩ්',
        'Jaleel' => 'ජලීල්',
        'Nazeer' => 'නසීර්',
        'Imam' => 'ඉමාම්',
        'Sultan' => 'සුල්තාන්',
        'Shan' => 'ෂාන්',
        'Shantha' => 'ශාන්ත',
        'Rizwan' => 'රිස්වාන්',
        'Nadeem' => 'නදීම්',
        'Yousuf' => 'යූසුෆ්',
        'Sajith' => 'සජිත්',
        'Nimal' => 'නිමල්',
        'Sunil' => 'සුනිල්',
        'Ruwan' => 'රුවන්',
        'Chathura' => 'චතුර',
        'Asela' => 'අසේල',
        'Kamal' => 'කමල්',
        'Ranjan' => 'රංජන්',
        'Dinesh' => 'දිනේෂ්',
        'Pradeep' => 'ප්‍රදීප්',
        'Suresh' => 'සුරේෂ්',
        'Nuwan' => 'නුවන්',
        'Lakshan' => 'ලක්ෂාන්',
        'Tharindu' => 'තරිඳු',
        'Hiran' => 'හිරාන්',
        'Kasun' => 'කසුන්',
        'Dilshan' => 'දිල්ෂාන්',
        'Chamara' => 'චාමර',
        'Ravindra' => 'රවීන්ද්‍ර',
        'Mahesh' => 'මහේෂ්',
        'Gayan' => 'ගයන්',
        'Roshan' => 'රොෂාන්',
        'Prasanna' => 'ප්‍රසන්න',
        'Sanjaya' => 'සංජය',
        'Dulanjana' => 'දුලංජන',
        'Thushara' => 'තුෂාර',
        'Nadeesha' => 'නදීෂා',
        'Chaminda' => 'චමින්ද',
        'Sahan' => 'සහන්',
        'Vijay' => 'විජේ',
        'Ajith' => 'අජිත්',
        'Rohitha' => 'රෝහිත',
        'Chathuranga' => 'චතුරංග',
        'Dilhara' => 'දිල්හාර',
        'Sasanka' => 'සසංක',
        'Ramesh' => 'රමේෂ්',
        'Nishan' => 'නිෂාන්',
        'Kasun' => 'කසුන්',
        'Dilruk' => 'දිල්රුක්',
        'Thilina' => 'තිලින',
        'Heshan' => 'හේෂාන්',
        'Lahiru' => 'ලහිරු',
        'Sadeepa' => 'සදීප',
        'Dhanushka' => 'ධනුෂ්ක',
        'Pulasthi' => 'පුලස්ති',
        'Ravindu' => 'රවින්දු',
        'Sadeera' => 'සදීර',
        'Nishantha' => 'නිශාන්ත',
        'Chamika' => 'චමික්ක',
        'Lakshitha' => 'ලක්ෂිත',
        'Dulan' => 'දුලන්',
        'Ravishka' => 'රවිශ්ක',
        'Sahan' => 'සහන්',
        'Vishwa' => 'විශ්ව',
        'Ajith' => 'අජිත්',
        'Rohitha' => 'රෝහිත',
        'Chathuranga' => 'චතුරංග',
        'Dilhara' => 'දිල්හාර',
        'Sasanka' => 'සසංක',
        'Thanushanth' => 'තනුෂාන්ත්',
        'Kiloran' => 'කිලෝරන්',
        'Nipuna' => 'නිපුන',
        'Yashoda' => 'යශෝධා',
        'Sujith' => 'සුජිත්',
        'Niroshan' => 'නිරෝෂන්',
        'Praveen' => 'ප්‍රවීන්',
        'Ruwantha' => 'රුවන්තා',
        'Sasindu' => 'සසිඳු',
        'Galagedara' => 'ගලගෙදර',
        'Hettiarachchi' => 'හෙට්ටිආරච්චි',
        'Kodituwakku' => 'කොඩිතුවක්කු',
        'Madushanka' => 'මධුශංක',
        'Nawarathna' => 'නවරත්න',
        'Pathirage' => 'පතිරගේ',
        'Senadheera' => 'සේනාධීර',
        'Thennakoon' => 'තෙන්නකෝන්',
        'Udugama' => 'උඩුගම',
        'Vithanage' => 'විථානගේ',
        'Wickramaratne' => 'වික්‍රමරත්න',
        'Yapa' => 'යාපා',
        'Zoysa' => 'සොයිසා',
        'Kubalgedara' => 'කුඹල්ගෙදර',
        'Hewagamage' => 'හේවගමේ',
        'Jayakody' => 'ජයකොඩි',
        'Mudalige' => 'මුදලිගේ',
        'Kodippili' => 'කොඩිප්පිලි',
        'Piyadasa' => 'පියදසා',
        'Ranasinghe' => 'රණසිංහ',
        'Sivapalan' => 'සිවපාලන්',
        'Tharanga' => 'තරංග',
        'Udayanga' => 'උදයංග',
        'Vidanapathirana' => 'විදානපතිරණ',
        'Wickramasinghe' => 'වික්‍රමසිංහ',
        'Yasaratne' => 'යසරාත්න',
        'Dayawathi' => 'දයාවතී',
        'Edirisinghe' => 'එදිරිසිංහ',
        'Goonetilleke' => 'ගුණතිලක',
        'Hewapathirana' => 'හේවාපතිරණ',
        'Jayawardena' => 'ජයවර්ධන',

        //Female Sinhala Names
        'Menike' => 'මැණිකේ',
        'Nisansala' => 'නිසංසලා',
        'Sakunthala' => 'පියසේන',
        'Piyasili' => 'පියසීලි',
        'Kumari' => 'කුමාරි',
        'Chandani' => 'චන්දානි',
        'Dilani' => 'දිලානි',
        'Anusha' => 'අනුෂා',
        'Nadeesha' => 'නදීෂා',
        'Tharushi' => 'තරුෂි',
        'Upeksha' => 'උපේක්ෂා',
        'Vimukthi' => 'විමුක්ති',
        'Yasodha' => 'යසෝධා',
        'Sulochana' => 'සුලෝචනා',
        'Kanchana' => 'කංචනා',
        'Nirosha' => 'නිරෝෂා',
        'Piumi' => 'පියුමි',
        'Rashmi' => 'රශ්මි',
        'Samanthi' => 'සමන්ති',
        'Thilini' => 'තිලිනි',
        'Uththara' => 'උත්තරා',
        'Vimala' => 'විමලා',
        'Yamuna' => 'යමුනා',
        'Sasini' => 'සසිනි',
        'Nisansala' => 'නිසංසලා',
        'Tharushi' => 'තරුෂි',
        'Upeksha' => 'උපේක්ෂා',
        'Vimukthi' => 'විමුක්ති',
        'Yasodha' => 'යසෝධා',
        'Sulochana' => 'සුලෝචනා',
        'Kanchana' => 'කංචනා',
        'Nirosha' => 'නිරෝෂා',
        'Piumi' => 'පියුමි',
        'Rashmi' => 'රශ්මි',
        'Samanthi' => 'සමන්ති',
        'Thilini' => 'තිලිනි',
        'Uththara' => 'උත්තරා',
        'Vimala' => 'විමලා',
        'Yamuna' => 'යමුනා',
        'Anuradha' => 'අනුරාධා',
        'Buddhika' => 'බුද්ධිකා',
        'Chathurika' => 'චතුරිකා',
        'Dilhani' => 'දිල්හානි',
        'Eresha' => 'ඇරේෂා',
        'Fathima' => 'ෆාතිමා',
        'Ganga' => 'ගංගා',
        'Himali' => 'හිමාලි',
        'Iresha' => 'ඉරේෂා',
        'Janaki' => 'ජානකී',
        'Kumari' => 'කුමාරි',
        'Lahiru' => 'ලහිරු',
        'Madhavi' => 'මධාවි',
        'Nadeesha' => 'නදීෂා',
        'Oshadi' => 'ඔෂාදි',
        'Pavithra' => 'පවිත්‍රා',
        'Ruwani' => 'රුවන්ි',
        'Shanika' => 'ෂානිකා',
        'Tharushi' => 'තරුෂි',
        'Upeksha' => 'උපේක්ෂා',
        'Vimukthi' => 'විමුක්ති',
        'Yasodha' => 'යසෝධා',
        'Sulochana' => 'සුලෝචනා',
        'Kanchana' => 'කංචනා',

        //Tamil Names in Sinhala
        'Arun' => 'අරුණ්',
        'Kumar' => 'කුමාර්',
        'Ravi' => 'රවි',
        'Suresh' => 'සුරේෂ්',
        'Vijay' => 'විජේ',
        'Ajith' => 'අජිත්',
        'Pradeep' => 'ප්‍රදීප්',
        'Ramesh' => 'රමේෂ්',
        'Karthik' => 'කාර්තික්',
        'Manoj' => 'මනෝජ්',
        'Naveen' => 'නවීන්',
        'Sanjay' => 'සංජේ',
        'Dinesh' => 'දිනේෂ්',
        'Gokul' => 'ගෝකුල්',
        'Hari' => 'හරි',
        'Jeevan' => 'ජීවන්',
        'Kishore' => 'කිෂෝර්',
        'Lokesh' => 'ලෝකේෂ්',
        'Mohan' => 'මෝහන්',
        'Prakash' => 'ප්‍රකාශ්',
        'Ranjith' => 'රංජිත්',
        'Sathish' => 'සතිශ්',
        'Vasanth' => 'වසන්ත',
        'Yogesh' => 'යෝගේෂ්',
        'Balaji' => 'බාලාජි',
        'Chandran' => 'චන්ද්‍රන්',
        'Dev' => 'දේව්',
        'Eshan' => 'ඉෂාන්',
        'Ganesh' => 'ගනේෂ්',
        'Hemanth' => 'හේමන්ත',
        'Ilangovan' => 'ඉලංගෝවන්',
        'Jayanth' => 'ජයන්ත',
        'Kannan' => 'කන්නන්',
        'Lalith' => 'ලලිත්',
        'Magesh' => 'මගේෂ්',
        'Nithin' => 'නිතින්',
        'Prithvi' => 'ප්‍රිත්වි',
        'Rithish' => 'රිතිෂ්',
        'Sathyan' => 'සත්‍යන්',
        'Vignesh' => 'විග්නේෂ්',
        'Yuvan' => 'යුවන',
        'Anitha' => 'අනිථා',
        'Bhuvaneswari' => 'භුවනේශ්වරී',
        'Chitra' => 'චිත්‍රා',
        'Divya' => 'දිව්‍යා',
        'Esha' => 'ඉෂා',
        'Fathima' => 'ෆාතිමා',
        'Gayathri' => 'ගයාත්‍රි',
        'Hema' => 'හේමා',
        'Indu' => 'ඉන්දු',
        'Janani' => 'ජානනි',
        'Kavitha' => 'කවිථා',
        'Lakshmi' => 'ලක්‍ෂ්මි',
        'Meena' => 'මීනා',
        'Nandini' => 'නන්දිනි',
        'Oviya' => 'ඔවියා',
        'Pavithra' => 'පවිත්‍රා',
        'Rashmi' => 'රශ්මි',
        'Sangeetha' => 'සංගීතා',
        'Tharini' => 'තරිණි',
        'Usha' => 'උෂා',
        'Vijaya' => 'විජයා',
        'Yalini' => 'යාලිනි',
        'Zara' => 'සාරා',

        //Sinhala Traditional Names
        'Vijaypala' => 'විජේපාල',
        'Rathnayake' => 'රත්නායක',
        'Jayathilaka' => 'ජයතිලක',
        'Bandara' => 'බණ්ඩාර',
        'Senarath' => 'සේනාරත්',
        'Kumara' => 'කුමාර',
        'Perera' => 'පෙරේරා',
        'Silva' => 'සිල්වා',
        'Jayawardena' => 'ජයවර්ධන',
        'Kumarasinghe' => 'කුමාරසිංහ',
        'Wijesinghe' => 'විජේසිංහ',
        'Gunawardena' => 'ගුණවර්ධන',
        'Rajapaksa' => 'රාජපක්ෂ',
        'Kulathunga' => 'කුලතුංග',
        'Abeywardena' => 'අබේවර්ධන',
        'Samarasinghe' => 'සමරසිංහ',
        'Wickramasinghe' => 'වික්‍රමසිංහ',
        'Ekanayake' => 'ඒකනායක',
        'Jayasinghe' => 'ජයසිංහ',

    ];

    /**
     * English to Sinhala letter mapping for initials conversion
     */
    protected $initialMap = [
        'a' => 'ඒ', 'A' => 'ඒ',
        'b' => 'බී', 'B' => 'බී',
        'c' => 'සී', 'C' => 'සී',
        'd' => 'ඩී', 'D' => 'ඩී',
        'e' => 'ඊ', 'E' => 'ඊ',
        'f' => 'එෆ්', 'F' => 'එෆ්',
        'g' => 'ජී', 'G' => 'ජී',
        'h' => 'එච්', 'H' => 'එච්',
        'i' => 'අයි', 'I' => 'අයි',
        'j' => 'ජේ', 'J' => 'ජේ',
        'k' => 'කේ', 'K' => 'කේ',
        'l' => 'එල්', 'L' => 'එල්',
        'm' => 'එම්', 'M' => 'එම්',
        'n' => 'එන්', 'N' => 'එන්',
        'o' => 'ඕ', 'O' => 'ඕ',
        'p' => 'පී', 'P' => 'පී',
        'q' => 'කිව්', 'Q' => 'කිව්',
        'r' => 'ආර්', 'R' => 'ආර්',
        's' => 'එස්', 'S' => 'එස්',
        't' => 'ටී', 'T' => 'ටී',
        'u' => 'යූ', 'U' => 'යූ',
        'v' => 'වී', 'V' => 'වී',
        'w' => 'ඩබ්', 'W' => 'ඩබ්',
        'x' => 'එක්ස්', 'X' => 'එක්ස්',
        'y' => 'වයි', 'Y' => 'වයි',
        'z' => 'ඉසෙඩ්', 'Z' => 'ඉසෙඩ්'
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
