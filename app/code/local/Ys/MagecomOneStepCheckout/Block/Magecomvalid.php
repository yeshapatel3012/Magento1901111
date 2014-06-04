<?php
/**
 *    MagecomOneStepCheckout main block
 *    @author Yesha Patel <mail@magecomonestepcheckout.com>
 *    @copyright Yesha Patel <mail@magecomonestepcheckout.com>
 *
 */

class Ys_MagecomOneStepCheckout_Block_Magecomvalid extends Mage_Core_Block_Template
{
    public function _toHtml()
    {
        $helper = Mage::helper('magecomonestepcheckout/checkout');
        $message = false;

        if($helper->canRun(false)) {
            return '';
        }

        if($helper->canRun(true)) {
            return base64_decode('PGRpdiBzdHlsZT0iYm9yZGVyOiAxcHggc29saWQgZ3JleTsgcGFkZGluZzogNXB4OyBtYXJnaW4tYm90dG9tOiA1cHg7IG1hcmdpbi10b3A6IDVweDsgdGV4dC1hbGlnbjogY2VudGVyIiA+VGhpcyBPbmVTdGVwQ2hlY2tvdXQgaXMgcnVubmluZyBvbiBhIGRldmVsb3BtZW50IHNlcmlhbC4gRG8gbm90IHVzZSB0aGlzIHNlcmlhbCBmb3IgcHJvZHVjdGlvbiBlbnZpcm9ubWVudHMuPC9kaXY+');
        }

        return str_replace('[DOMAIN]', $_SERVER['SERVER_NAME'],  base64_decode('PGRpdiBzdHlsZT0iYm9yZGVyOiAzcHggc29saWQgcmVkOyBwYWRkaW5nOiA1cHg7IG1hcmdpbi1ib3R0b206IDE1cHg7IG1hcmdpbi10b3A6IDE1cHg7Ij5QbGVhc2UgZW50ZXIgYSB2YWxpZCBzZXJpYWwgZm9yIHRoZSBkb21haW4gIltET01BSU5dIiBpbiB5b3VyIGFkbWluaXN0cmF0aW9uIHBhbmVsLiBJZiB5b3UgZG9uJ3QgaGF2ZSBvbmUsIHBsZWFzZSBwdXJjaGFzZSBhIHZhbGlkIGxpY2Vuc2UgZnJvbSA8YSBocmVmPSJodHRwOi8vbWFnZWNvbXNvbHV0aW9uLmNvbSIgdGFyZ2V0PSJfYmxhbmsiPmh0dHA6Ly9tYWdlY29tc29sdXRpb24uY29tPC9hPjwvZGl2Pg=='));
    }
}

