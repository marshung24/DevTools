<?php
namespace marsapp\dev\tools;


class DevTools
{
    /**
     * 取得執行時間
     *
     * @param string $prefix                前綴文字
     * @param string $runTimeNameSpace      計算執行時間的名稱空間
     * @param bool $init                    重置
     * @return string
     */
    public static function getRunTime($prefix = '', $runTimeNameSpace = 'runTimeName', $init = false){
        if(empty($runTimeNameSpace))
            $runTimeNameSpace = 'runTimeName';
            if ($init)
                $_SESSION[$runTimeNameSpace] = microtime(true);
                
                // 取得上次執行時間
                $lastRunTime = isset($_SESSION[$runTimeNameSpace]) ? $_SESSION[$runTimeNameSpace] : microtime(true);
                // 取得本次執行時間
                $nowRunTime = microtime(true);
                // 記錄本次執行時間
                $_SESSION[$runTimeNameSpace] = $nowRunTime;
                // 建立訊息字串
                $noteString = (strlen($prefix)>0 ? $prefix.': ':'') . number_format($nowRunTime-$lastRunTime,8)."\n";
                // 回傳
                return $noteString;
    }
    
    /**
     * Check if the two objects are the same
     * 
     * @param mixed $data
     * @param mixed $hope
     * @param bool $detail Show Detail(default false)
     * @return boolean
     */
    public static function theSame($data, $hope, $detail = false)
    {
        if ($detail) {
            echo '$data = '.var_export($data, 1)."\n";
            echo '$hope = '.var_export($hope, 1)."\n";
            echo "\n";
        }
        
        return json_encode($data) == json_encode($hope);
    }
    
    /**
     * Display status message
     * 
     * @param unknown $theSame
     * @param unknown $functionName
     */
    public static function isTheSame($theSame, $functionName)
    {
        if ($theSame) {
            echo $functionName . ': OK...'."\n\n";
        } else {
            echo $functionName . ': Different !!!'."\n\n";
        }
    }
}


