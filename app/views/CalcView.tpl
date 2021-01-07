{extends file="main.tpl"}

{block name=footer}przykładowa tresć stopki wpisana do szablonu głównego z szablonu kalkulatora{/block}

{block name=content}
    <h3>Prosty kalkulator</h3>
    <form class="pure-form pure-form-stacked" action="{$conf->action_root}calcCompute" method="post">
        <fieldset>
            <label>Kwota: </label>
            <input type="number" placeholder="Kwota pożyczki" min="1" name="creditValue" value="{$form->creditValue}"/><br/>
            <label>Ilość lat: </label>
            <input type="number" min="1" placeholder="Okres" name="years" value="{$form->years}"/><br/>
            <label>Oprocentowanie: </label>
            <input type="number" min="1" placeholder="Oprocentowanie" name="percent" value="{$form->percent}"/><br/>
        </fieldset>
        <button type="submit" class="pure-button pure-button-primary">Oblicz</button>
    </form>
    <div class="messages">

        {if $msgs->isError()}
            <h4>Wystąpiły błędy: </h4>
            <ol class="err">
                {foreach $msgs->getErrors() as $err}
                    {strip}
                        <li>{$err}</li>
                    {/strip}
                {/foreach}
            </ol>
        {/if}

        {if $msgs->isInfo()}
            <h4>Informacje: </h4>
            <ol class="inf">
                {foreach $msgs->getInfos() as $inf}
                    {strip}
                        <li>{$inf}</li>
                    {/strip}
                {/foreach}
            </ol>
        {/if}

        {if isset($res->result)}
            <h4>Wynik</h4>
            <p class="res">
                Miesięczna rata wynosi: {$res->result}zł
            </p>
        {/if}

    </div>
{/block}