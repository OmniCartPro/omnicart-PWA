<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function storeThemeColor(Request $request)
    {
        $request->validate([
            'color' => 'required|string'
        ]);

        // حفظ اللون داخل جدول الإعدادات
        DB::table('settings')->updateOrInsert(
            ['key' => 'theme_color'],
            ['payload' => json_encode(['value' => $request->color])]
        );

        return response()->json([
            'success' => true,
            'message' => 'Color saved successfully',
            'color' => $request->color
        ]);
    }
}
