<?php

namespace App\Helpers;

class Icons
{
   // ----------------HOME ICON----------------------
   public static function home(array $attrs = []): string
   {
      $attrString = self::buildAttributes($attrs);

      return <<<SVG
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" $attrString fill="currentColor">
                  <path d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
               </svg>
               SVG;
   }
   // ----------------BOOK ICON----------------------
   public static function book(array $attrs = []): string
   {
      $attrString = self::buildAttributes($attrs);

      return <<<SVG
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" $attrString fill="currentColor">
                  <path d="M320 216C368.6 216 408 176.6 408 128C408 79.4 368.6 40 320 40C271.4 40 232 79.4 232 128C232 176.6 271.4 216 320 216zM320 514.7L320 365.4C336.3 358.6 352.9 351.7 369.7 344.7C408.7 328.5 450.5 320.1 492.8 320.1L512 320.1L512 480.1L492.8 480.1C433.7 480.1 375.1 491.8 320.5 514.6L320 514.8zM320 296L294.9 285.5C248.1 266 197.9 256 147.2 256L112 256C85.5 256 64 277.5 64 304L64 496C64 522.5 85.5 544 112 544L147.2 544C197.9 544 248.1 554 294.9 573.5L307.7 578.8C315.6 582.1 324.4 582.1 332.3 578.8L345.1 573.5C391.9 554 442.1 544 492.8 544L528 544C554.5 544 576 522.5 576 496L576 304C576 277.5 554.5 256 528 256L492.8 256C442.1 256 391.9 266 345.1 285.5L320 296z"/>
               </svg>
               SVG;
   }
   // ----------------MOON ICON----------------------
   public static function moon(array $attrs = []): string
   {
      $attrString = self::buildAttributes($attrs);

      return <<<SVG
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" $attrString fill="currentColor">
                     <path d="M320 64C178.6 64 64 178.6 64 320C64 461.4 178.6 576 320 576C388.8 576 451.3 548.8 497.3 504.6C504.6 497.6 506.7 486.7 502.6 477.5C498.5 468.3 488.9 462.6 478.8 463.4C473.9 463.8 469 464 464 464C362.4 464 280 381.6 280 280C280 207.9 321.5 145.4 382.1 115.2C391.2 110.7 396.4 100.9 395.2 90.8C394 80.7 386.6 72.5 376.7 70.3C358.4 66.2 339.4 64 320 64z"/>
                  </svg>
               SVG;
   }
   // ----------------CROSS ICON----------------------
   public static function cross(array $attrs = []): string
   {
      $attrString = self::buildAttributes($attrs);

      return <<<SVG
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" $attrString fill="currentColor">
                     <path d="M183.1 137.4C170.6 124.9 150.3 124.9 137.8 137.4C125.3 149.9 125.3 170.2 137.8 182.7L275.2 320L137.9 457.4C125.4 469.9 125.4 490.2 137.9 502.7C150.4 515.2 170.7 515.2 183.2 502.7L320.5 365.3L457.9 502.6C470.4 515.1 490.7 515.1 503.2 502.6C515.7 490.1 515.7 469.8 503.2 457.3L365.8 320L503.1 182.6C515.6 170.1 515.6 149.8 503.1 137.3C490.6 124.8 470.3 124.8 457.8 137.3L320.5 274.7L183.1 137.4z"/>
                  </svg>
               SVG;
   }
   // ----------------Arrow ICON----------------------
   public static function chevronUp(array $attrs = []): string
   {
      $attrString = self::buildAttributes($attrs);

      return <<<SVG
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" $attrString fill="currentColor"> 
                     <path d="M297.4 169.4C309.9 156.9 330.2 156.9 342.7 169.4L534.7 361.4C547.2 373.9 547.2 394.2 534.7 406.7C522.2 419.2 501.9 419.2 489.4 406.7L320 237.3L150.6 406.6C138.1 419.1 117.8 419.1 105.3 406.6C92.8 394.1 92.8 373.8 105.3 361.3L297.3 169.3z"/>
                  </svg>
               SVG;
   }
   // ----------------Arrow ICON----------------------
   public static function chevronDown(array $attrs = []): string
   {
      $attrString = self::buildAttributes($attrs);

      return <<<SVG
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640" $attrString fill="currentColor">
                     <path d="M297.4 470.6C309.9 483.1 330.2 483.1 342.7 470.6L534.7 278.6C547.2 266.1 547.2 245.8 534.7 233.3C522.2 220.8 501.9 220.8 489.4 233.3L320 402.7L150.6 233.4C138.1 220.9 117.8 220.9 105.3 233.4C92.8 245.9 92.8 266.2 105.3 278.7L297.3 470.7z"/>
                  </svg>
               SVG;
   }
   // ----------------STATIC FIXED METHOD---------------------
   protected static function buildAttributes(array $attrs): string
   {
      return collect($attrs)
         ->map(fn($v, $k) => $k . '="' . e($v) . '"')
         ->implode(' ');
   }
}
