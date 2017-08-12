#include <FileConstants.au3>
#include <MsgBoxConstants.au3>

$sFilePhpMemcacheDll = ".\PhpDLL\php_memcache-3.0.8-5.6-ts-vc11-x86.dll"
$sFolderExt = "c:\tools\xampp\php\ext"
$sFilePhpIni = "C:\tools\xampp\php\php.ini"

If FileExists ("c:\tools\xampp\php\ext") Then
  FileCopy($sFilePhpMemcacheDll,$sFolderExt & "\php_memcache.dll", 1)
EndIf

If FileExists ($sFilePhpIni) Then
   if Not FileSearchLine($sFilePhpIni, "extension=php_memcache.dll") Then
	  $hFileOpen = FileOpen($sFilePhpIni, $FO_APPEND)
	  FileWriteLine($hFileOpen, "")
	  FileWriteLine($hFileOpen, ";----------------------------------")
	  FileWriteLine($hFileOpen, "extension=php_memcache.dll")
	  FileWriteLine($hFileOpen, "[Memcache]")
	  FileWriteLine($hFileOpen, "memcache.allow_failover = 1")
	  FileWriteLine($hFileOpen, "memcache.max_failover_attempts=20")
	  FileWriteLine($hFileOpen, "memcache.chunk_size =8192")
	  FileWriteLine($hFileOpen, "memcache.default_port = 11211")
	  FileWriteLine($hFileOpen, ";----------------------------------")
	  FileClose($hFileOpen)
   EndIf
EndIf

Run("c:\windows\system32\cmd.exe")


Func FileSearchLine($sFile, $textSearch)

    Local $aArray = FileReadToArray($sFile)
    If @error Then
        MsgBox($MB_SYSTEMMODAL, "", "There was an error reading the file. @error: " & @error) ; An error occurred reading the current script file.
    Else
        For $i = 0 To UBound($aArray) - 1
			If $textSearch = $aArray[$i] Then
			   Return true
			EndIf
        Next
	 EndIf
   Return False
EndFunc