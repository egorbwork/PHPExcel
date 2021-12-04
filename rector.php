<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Php70\Rector\Assign\ListSplitStringRector;
use Rector\Php70\Rector\Assign\ListSwapArrayOrderRector;
use Rector\Php70\Rector\Break_\BreakNotInLoopOrSwitchToReturnRector;
use Rector\Php70\Rector\ClassMethod\Php4ConstructorRector;
use Rector\Php70\Rector\FuncCall\CallUserMethodRector;
use Rector\Php70\Rector\FuncCall\EregToPregMatchRector;
use Rector\Php70\Rector\FuncCall\MultiDirnameRector;
use Rector\Php70\Rector\FuncCall\NonVariableToVariableOnFunctionCallRector;
use Rector\Php70\Rector\If_\IfToSpaceshipRector;
use Rector\Php70\Rector\List_\EmptyListRector;
use Rector\Php70\Rector\Ternary\TernaryToNullCoalescingRector;
use Rector\Php70\Rector\Ternary\TernaryToSpaceshipRector;
use Rector\Php70\Rector\Variable\WrapVariableVariableNameInCurlyBracesRector;
use Rector\Php71\Rector\Assign\AssignArrayToStringRector;
use Rector\Php71\Rector\BinaryOp\BinaryOpBetweenNumberAndStringRector;
use Rector\Php71\Rector\BooleanOr\IsIterableRector;
use Rector\Php71\Rector\FuncCall\CountOnNullRector;
use Rector\Php71\Rector\FuncCall\RemoveExtraParametersRector;
use Rector\Php71\Rector\List_\ListToArrayDestructRector;
use Rector\Php72\Rector\Assign\ListEachRector;
use Rector\Php72\Rector\Assign\ReplaceEachAssignmentWithKeyCurrentRector;
use Rector\Php72\Rector\FuncCall\CreateFunctionToAnonymousFunctionRector;
use Rector\Php72\Rector\FuncCall\GetClassOnNullRector;
use Rector\Php72\Rector\FuncCall\ParseStrWithResultArgumentRector;
use Rector\Php72\Rector\FuncCall\StringifyDefineRector;
use Rector\Php72\Rector\Unset_\UnsetCastRector;
use Rector\Php72\Rector\While_\WhileEachToForeachRector;
use Rector\Php73\Rector\BooleanOr\IsCountableRector;
use Rector\Php73\Rector\ConstFetch\SensitiveConstantNameRector;
use Rector\Php73\Rector\FuncCall\ArrayKeyFirstLastRector;
use Rector\Php73\Rector\FuncCall\RegexDashEscapeRector;
use Rector\Php73\Rector\FuncCall\SensitiveDefineRector;
use Rector\Php73\Rector\FuncCall\SetCookieRector;
use Rector\Php73\Rector\FuncCall\StringifyStrNeedlesRector;
use Rector\Php74\Rector\ArrayDimFetch\CurlyToSquareBracketArrayStringRector;
use Rector\Php74\Rector\Assign\NullCoalescingOperatorRector;
use Rector\Php74\Rector\Double\RealToFloatTypeCastRector;
use Rector\Php74\Rector\FuncCall\ArrayKeyExistsOnPropertyRector;
use Rector\Php74\Rector\FuncCall\ArraySpreadInsteadOfArrayMergeRector;
use Rector\Php74\Rector\FuncCall\FilterVarToAddSlashesRector;
use Rector\Php74\Rector\FuncCall\GetCalledClassToStaticClassRector;
use Rector\Php74\Rector\FuncCall\MbStrrposEncodingArgumentPositionRector;
use Rector\Php74\Rector\MethodCall\ChangeReflectionTypeToStringToGetNameRector;
use Rector\Php74\Rector\Property\TypedPropertyRector;
use Rector\Php74\Rector\StaticCall\ExportToReflectionFunctionRector;
use Rector\Php80\Rector\Catch_\RemoveUnusedVariableInCatchRector;
use Rector\Php80\Rector\ClassMethod\FinalPrivateToPrivateVisibilityRector;
use Rector\Php80\Rector\ClassMethod\SetStateToStaticRector;
use Rector\Php80\Rector\FuncCall\ClassOnObjectRector;
use Rector\Php80\Rector\FuncCall\TokenGetAllToObjectRector;
use Rector\Php80\Rector\Identical\StrEndsWithRector;
use Rector\Php80\Rector\Identical\StrStartsWithRector;
use Rector\Php80\Rector\NotIdentical\StrContainsRector;
use Rector\Php80\Rector\Ternary\GetDebugTypeRector;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // get parameters
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::PATHS, [
        __DIR__ . '/Classes',
        __DIR__ . '/unitTests',
        __DIR__ . '/Examples',
    ]);
    $parameters->set(Option::AUTOLOAD_FILE, __DIR__ . '/vendor/autoload.php');

    // Define what rule sets will be applied
//    $containerConfigurator->import(SetList::DEAD_CODE);

    // get services (needed for register a single rule)
    $services = $containerConfigurator->services();

    // PHP 7.0
    $services->set(BreakNotInLoopOrSwitchToReturnRector::class);
    $services->set(CallUserMethodRector::class);
    $services->set(EmptyListRector::class);
    $services->set(EregToPregMatchRector::class);
    $services->set(IfToSpaceshipRector::class);
    $services->set(ListSplitStringRector::class);
    $services->set(ListSwapArrayOrderRector::class);
    $services->set(MultiDirnameRector::class);
    $services->set(NonVariableToVariableOnFunctionCallRector::class);
    $services->set(Php4ConstructorRector::class);
    $services->set(TernaryToNullCoalescingRector::class);
    $services->set(TernaryToSpaceshipRector::class);
    $services->set(WrapVariableVariableNameInCurlyBracesRector::class);

    // PHP 7.1
    $services->set(AssignArrayToStringRector::class);
    $services->set(BinaryOpBetweenNumberAndStringRector::class);
    $services->set(CountOnNullRector::class);
    $services->set(IsIterableRector::class);
    $services->set(ListToArrayDestructRector::class);
    $services->set(RemoveExtraParametersRector::class);

    // PHP 7.2
    $services->set(CreateFunctionToAnonymousFunctionRector::class);
    $services->set(GetClassOnNullRector::class);
    $services->set(ListEachRector::class);
    $services->set(ParseStrWithResultArgumentRector::class);
    $services->set(ReplaceEachAssignmentWithKeyCurrentRector::class);
    $services->set(StringifyDefineRector::class);
    $services->set(UnsetCastRector::class);
    $services->set(WhileEachToForeachRector::class);

    // PHP 7.3
    $services->set(ArrayKeyFirstLastRector::class);
    $services->set(IsCountableRector::class);
    $services->set(RegexDashEscapeRector::class);
    $services->set(SensitiveConstantNameRector::class);
    $services->set(SensitiveDefineRector::class);
    $services->set(SetCookieRector::class);
    $services->set(StringifyStrNeedlesRector::class);

    // PHP 7.4
    $services->set(ArrayKeyExistsOnPropertyRector::class);
    $services->set(ArraySpreadInsteadOfArrayMergeRector::class);
    $services->set(ChangeReflectionTypeToStringToGetNameRector::class);
    $services->set(CurlyToSquareBracketArrayStringRector::class);
    $services->set(ExportToReflectionFunctionRector::class);
    $services->set(FilterVarToAddSlashesRector::class);
    $services->set(GetCalledClassToStaticClassRector::class);
    $services->set(MbStrrposEncodingArgumentPositionRector::class);
    $services->set(NullCoalescingOperatorRector::class);
    $services->set(RealToFloatTypeCastRector::class);

    // PHP 8.0
    $services->set(ClassOnObjectRector::class);
    $services->set(FinalPrivateToPrivateVisibilityRector::class);
    $services->set(GetDebugTypeRector::class);
    $services->set(RemoveUnusedVariableInCatchRector::class);
    $services->set(SetStateToStaticRector::class);
    $services->set(StrContainsRector::class);
    $services->set(StrEndsWithRector::class);
    $services->set(StrStartsWithRector::class);
    $services->set(TokenGetAllToObjectRector::class);


    // register a single rule
    // $services->set(TypedPropertyRector::class);
};
