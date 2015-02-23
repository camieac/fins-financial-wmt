package Grammar;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Iterator;
import java.util.List;

import org.antlr.v4.runtime.misc.NotNull;

import Grammar.BinaryT.Exp;

public class BinaryTCountVisitor extends CWBaseVisitor<BinaryT.AST> 
{
	
	HashMap <String, Exp> value = new HashMap <String, BinaryT.Exp> (); // HashMap that is used for the values of variables.
    
    public BinaryT.AST visitVariable(@NotNull CWParser.VariableContext ctx) 
    	{
            if(value.containsKey(ctx.VARIABLE().toString()))
            	{
                    return new BinaryT.ExpVar(value.get(ctx.VARIABLE().toString()).toString());
            	}
            return new BinaryT.ExpVar(ctx.VARIABLE().toString());
    	}

    
    public BinaryT.AST visitDefinition(@NotNull CWParser.DefinitionContext ctx) 
    	{
            value.put(ctx.VARIABLE().toString(),(BinaryT.Exp) visit(ctx.expression()));
            return new BinaryT.Definition(ctx.VARIABLE().toString(),(BinaryT.Exp) visit(ctx.expression()));
    	}

    
    public BinaryT.AST visitEquality(@NotNull CWParser.EqualityContext ctx) 
    	{
        return new BinaryT.ExpEquality((BinaryT.Exp) visit(ctx.expression(0)),(BinaryT.Exp) visit(ctx.expression(1)));
    	}
	
    
	public BinaryT.AST visitNumber(@NotNull CWParser.NumberContext ctx) 
		{
		return new BinaryT.ExpLeaf(Integer.parseInt(ctx.NUMBER().toString()));
		}
	

	public BinaryT.AST visitPair(@NotNull CWParser.PairContext ctx) 
		{
		return new BinaryT.ExpPair((BinaryT.Exp) visit(ctx.expression(0)),(BinaryT.Exp) visit(ctx.expression(1)));
		}
	
	
	public BinaryT.AST visitBracket(@NotNull CWParser.BracketContext ctx) 
		{
		return new BinaryT.ExpBracket((BinaryT.Exp) visit(ctx.expression()));
		}
	
	
	public BinaryT.AST visitInfix(@NotNull CWParser.InfixContext ctx) 
		{
		return new BinaryT.ExpInfix((BinaryT.Exp) visit(ctx.expression(0)),(BinaryT.Exp) visit(ctx.expression(1)));
		}
	
	
	public BinaryT.AST visitSet(@NotNull CWParser.SetContext ctx) // Using an ArrayList to put in all the required elements in the set and to remove duplicates.
		{	

		ArrayList<BinaryT.Exp> ExpressionList = new ArrayList<BinaryT.Exp>();
        ArrayList<String> StringList = new ArrayList<String>();
        int count = 0;
        
        boolean more = true; // Uses this boolean to catch and check if there are any more expressions required.
        while(more)
        {
                try
                {
                        if(!StringList.contains(visit(ctx.expression(count)).toString())) // Checks if it is a duplicate and if so it skips the adding to the ArrayLists.
                        {
                                StringList.add(visit(ctx.expression(count)).toString());
                                ExpressionList.add((Exp) visit(ctx.expression(count))); 
                        }
                        count++;
                }

                catch(Exception E)
                {
                        more = false;
                }

        }
		return new BinaryT.ExpSet(ExpressionList);
		}
	
	

	public BinaryT.AST visitParse(@NotNull CWParser.ParseContext ctx) 
	{
		List<BinaryT.Definition> defs = new ArrayList<BinaryT.Definition>();
		Iterator<CWParser.DefinitionContext> i = ctx.definition().iterator();
		do 
		{
			defs.add((BinaryT.Definition) visit(i.next()));
		} 
		while (i.hasNext());
		
		return new BinaryT.Definitions(defs);
	}
}
